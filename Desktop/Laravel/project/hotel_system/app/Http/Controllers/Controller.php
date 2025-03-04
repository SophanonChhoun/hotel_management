<?php

namespace App\Http\Controllers;

use App\Core\DateLib;
use App\Models\admin\Booking;
use App\Models\admin\BookingHasRooms;
use App\Models\admin\Room;
use App\Models\customer\CustomerLoginAccess;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        if(request()->header('Auth'))
        {
            $token = request()->header('Auth');
            $now = DateLib::getNow();
            CustomerLoginAccess::where("access_token",$token)->update([
               "expired_at" => $now->addDay()
            ]);
        }
        $current_date = Carbon::today()->format("Y-m-d");
        $booking=Booking::where("check_in_date","<=",$current_date)->where("check_out_date",">=",$current_date)->where("is_enable",true);
        $rooms = BookingHasRooms::whereIn("booking_id",$booking->pluck("id"));
        Room::whereIn("id",$rooms->pluck("room_id"))->update([
           "is_enable" => 0
        ]);
        Room::whereNotIn("id",$rooms->pluck("room_id"))->update([
            "is_enable" => 1
        ]);
    }

    protected function formatValidationErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }
    public function success ($data)
    {
        return response()->json(['success' => true, 'data' => $data]);
    }

    public function fail($message,$code = 403)
    {
        if($code == 500)
        {
            return response()->json(['success' => false, 'data' => "There is something wrong"]);
        }
        return response()->json(['success' => false, 'data' => $message]);
    }

}
