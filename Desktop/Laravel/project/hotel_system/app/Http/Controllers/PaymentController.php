<?php

namespace App\Http\Controllers;

use App\Models\admin\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payment = Payment::with("booking.room.roomType","customer");
        if(isset($request->is_enable))
        {
            $payment = $payment->where("is_enable",$request->is_enable);
        }
        $data = $payment->simplePaginate(10);
        $data = $data->map(function ($payment){
            $price = Arr::pluck($payment->booking->room,"roomType");
            dd($price);
        });
        return view('admin.payment.list',compact('data'));
    }
    public function show($id)
    {
        //
    }


}
