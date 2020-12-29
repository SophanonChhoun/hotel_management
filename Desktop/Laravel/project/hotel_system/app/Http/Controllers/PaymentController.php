<?php

namespace App\Http\Controllers;

use App\Models\admin\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Exception;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $payment = Payment::with("booking.room.roomType","customer");
        if(isset($request->is_enable))
        {
            $payment = $payment->where("is_enable",$request->is_enable);
        }
        $data = $payment->orderByDesc("id")->paginate(10);
        $data->getCollection()->transform(function ($payment){
            $room_type = Arr::pluck($payment->booking->room,"roomType");
            $room_type = Arr::pluck($room_type,'price');
            $payment['price'] = array_sum($room_type);
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
            $payment['total'] = array_sum($total);
            return view('admin.payment.show',compact('payment'));
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }


}
