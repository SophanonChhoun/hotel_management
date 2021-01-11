<?php

namespace App\Http\Controllers;

use App\Models\admin\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use DateTime;
use Exception;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $payment = Payment::with("booking.room.roomType","customer");
        if (isset($request->search)) {
            $payment = $payment->where("id", "LIKE", $request->search . "%");
        }
        if(isset($request->is_enable))
        {
            $payment = $payment->where("is_enable",$request->is_enable);
        }
        $data = $payment->orderByDesc("id")->paginate(10);
        $data->getCollection()->transform(function ($payment){
            if(!$payment->booking){
                $payment['price'] = 0;
            }else{
                $room_type = Arr::pluck($payment->booking->room,"roomType");
                $room_type = Arr::pluck($room_type,'price');
                $date1 = new DateTime($payment->booking->check_in_date);
                $date2 = new DateTime($payment->booking->check_out_date);
                $int = $date1->diff($date2);
                $days = $int->format("%a");
                $payment['price'] = array_sum($room_type) * $days;
            }
            return $payment;
        });
        return view('admin.payment.list',compact('data'));
    }
    public function show($id)
    {
        try {
            $payment = Payment::with("booking","booking.room.roomType","customer");

            $payment = $payment->find($id);
            $total = Arr::pluck($payment->booking->room,"roomType");
            $total = Arr::pluck($total,'price');
            $date1 = new DateTime($payment->booking->check_in_date);
            $date2 = new DateTime($payment->booking->check_out_date);
            $int = $date1->diff($date2);
            $days = $int->format("%a");
            $payment['days'] = $days;
            $payment['total'] = array_sum($total) * $days;
            return view('admin.payment.show',compact('payment'));
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }


}
