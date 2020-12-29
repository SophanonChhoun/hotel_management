<?php

namespace App\Http\Controllers;

use App\Models\admin\Booking;
use App\Models\admin\Payment;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Arr;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        try {
            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $booking = Booking::where("check_in_date",">=",$request->start_date)->
                where("check_out_date","<=",$request->end_date)->get();
            $bookingIDs = $booking->pluck("id");
            $payments = Payment::with("booking.room.roomType","customer")->whereIn("booking_id",$bookingIDs)->get();
            $payments = $payments->map(function ($payment) {
                $room_type = Arr::pluck($payment->booking->room,"roomType");
                $room_type = Arr::pluck($room_type,'price');
                $payment['price'] = array_sum($room_type);
                return $payment;
            });
            $total = $payments->pluck('price');
            $total = $total->sum();
            return view("admin.report.show",compact("payments","start_date","end_date","total"));
        }catch (Exception $exception){
            return redirect("/admin/dashboard");
        }
    }
}
