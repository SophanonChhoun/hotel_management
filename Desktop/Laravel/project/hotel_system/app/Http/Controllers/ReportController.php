<?php

namespace App\Http\Controllers;

use App\Models\admin\Booking;
use App\Models\admin\Payment;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Arr;
use DateTime;

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
                $date1 = new DateTime($payment->booking->check_in_date);
                $date2 = new DateTime($payment->booking->check_out_date);
                $int = $date1->diff($date2);
                $days = $int->format("%a");
                $room_type = Arr::pluck($room_type,'price');
                $payment['price'] = array_sum($room_type) * $days;
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
