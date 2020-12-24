<?php

namespace App\Http\Controllers;

use App\Core\DateLib;
use App\Models\admin\UserLoginAccess;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Exception;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\AdminAuthRequest;
use Illuminate\Support\Facades\Redirect;

class AdminAuthController extends Controller
{
    public function signin()
    {
        if(Session::get('auth'))
        {
            return \redirect('/test');
        }else{
            return view('layouts.login');

        }
    }

    public function getLoginAccess(Request $request,$credential_id)
    {
        DB::beginTransaction();
        try {
            $token = Password::getRepository()->createNewToken();
            $now = DateLib::getNow();
            $auth = UserLoginAccess::create([
                'user_id' => $credential_id,
                'access_token' => $token,
                'expired_at' => $now->addMinute(config('authentication.token_expiration_minute')),
                'revoked' => false,
            ]);
            $auth['expired_at'] = $now->timestamp;
            DB::commit();
            $user = User::where('id', $credential_id)->first();
            $result = [
                'access_token' => $auth['access_token'],
                'expired_at' => $auth['expired_at'],
                'user' => $user
            ];
            return $result;
        }catch (Exception $exception){
            DB::rollback();
            return $this->fail($exception->getMessage());
        }
    }

    public function login(Request $request)
    {
        DB::beginTransaction();
        try {
            if(auth()->attempt([
                'email' => $request['email'],
                'password' => $request['password'],
                'is_enable' => true,
            ])){
                $credential = auth()->user();
                $auth = self::getLoginAccess(
                    $request,
                    $credential->id
                );
                Session::put('auth', $auth);
                DB::commit();
                return redirect('/test');

            }else{
                return view('layouts.login', [
                    'errorMessageDuration' => 'Wrong login details',
                ]);
                return redirect()->back()->withErrors(['error','Wrong Login Details']);
            }
        }catch (Exception $exception){
            DB::rollback();
            return $this->fail($exception->getMessage());
        }
    }

    public function logout()
    {
        Session::forget("auth");
        return redirect("");
    }
}
