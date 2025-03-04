<?php

namespace App\Http\Middleware;

use App\Models\admin\UserLoginAccess;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\admin\User;
class AdminRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $token = Session::get("auth")['access_token'] ?? null;
        $logIn = UserLoginAccess::where("access_token",$token)->first();
        $user = User::find($logIn->user_id);
        if($user->role_id == 2){
            return $next($request);
        }

        return redirect('admin/dashboard');
    }
}
