<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin\User;
use App\Models\admin\Customer;
use App\Models\admin\Room;
use App\Models\admin\Booking;
use App\Models\admin\RoomType;
use Carbon\Carbon;
use DB;
use App\Models\admin\Payment;

class DashboardController extends Controller
{

    public function index(Request $request)
    {   
        $booking = Booking::all();
        $payment = Payment::all();
        $total_room = Room::count();
        $room_type = RoomType::count();
        $check_out = Booking::whereDate('check_out_date',DB::raw('CURDATE()' ))->count('check_out_date');
        $check_in = Booking::whereDate('check_in_date',DB::raw('CURDATE()' ))->count('check_in_date');
        $customer_today = Customer::whereDate('created_at',DB::raw('CURDATE()' ))->count('created_at');
        $payment_today = Payment::whereDate('created_at',DB::raw('CURDATE()' ))->count('created_at');
        $room_booked = Room::where('is_enable',DB::raw('0'))->count('is_enable');
        $room_available = Room::where('is_enable',DB::raw('1'))->count('is_enable');
        $customer = Customer::with("identification_type")->take(5)->get();
        
        $bookings = Booking::with("hotel","booking_type","customer");
        if(isset($request->search))
        {
            $bookings = $bookings->where("name","LIKE","%".$request->search."%");
        }
        if(isset($request->is_enable))
        {
            $bookings = $bookings->where("is_enable",$request->is_enable);
        }
        $data = $bookings->orderBy('id', 'DESC')->simplePaginate(5);

        return view('home',compact('payment','room_available','room_booked','customer','check_out','check_in','data','booking','total_room','room_type','customer_today','payment_today'));
    }

    

 
}
