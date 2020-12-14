<?php

namespace App\Http\Controllers;

use App\Models\admin\PaymentType;
use Illuminate\Http\Request;

class PaymentTypeController extends Controller
{
    public function index()
    {
        $payment_type = PaymentType::all();
        return view("admin.payment_type.edit",compact("payment_type"));
    }


    public function update(Request $request)
    {
        try {
            $idS = array_column($request->data,"id");
            PaymentType::whereNotIn("id",$idS)->delete();
            foreach ($request->data as $payment_type)
            {
                $data = [
                    'name' => $payment_type['name'],
                    'is_enable' => $payment_type['is_enable']
                ];

                $data = PaymentType::updateOrCreate([
                    "id" => $payment_type['id'] ?? null
                ],$data);
            }

            return $this->success("Success");
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }
}
