<?php

namespace App\Http\Controllers;

use App\Models\admin\BookingType;
use Illuminate\Http\Request;
use DB;
use Exception;

class BookingTypeController extends Controller
{
    public function index()
    {
        $booking_type = BookingType::all();
        return view("admin.booking_type.edit",compact("booking_type"));
    }


    public function update(Request $request)
    {
        try {
            $idS = array_column($request->data,"id");
            BookingType::whereNotIn("id",$idS)->delete();
            foreach ($request->data as $booking_type)
            {
                $data = [
                    'name' => $booking_type['name'],
                    'is_enable' => $booking_type['is_enable']
                ];

                $data = BookingType::updateOrCreate([
                    "id" => $booking_type['id'] ?? null
                ],$data);
            }

            return $this->success("Success");
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }
}
