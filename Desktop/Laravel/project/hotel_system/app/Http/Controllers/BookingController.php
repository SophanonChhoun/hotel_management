<?php

namespace App\Http\Controllers;

use App\Models\admin\Booking;
use App\Models\admin\BookingType;
use App\Models\admin\Hotel;
use App\Models\admin\PaymentType;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $bookings = Booking::with("hotel","booking_type");
        if(isset($request->search))
        {
            $bookings = $bookings->where("name","LIKE","%".$request->search."%");
        }
        if(isset($request->is_enable))
        {
            $bookings = $bookings->where("is_enable",$request->is_enable);
        }
        $data = $bookings->simplePaginate(10);

        return view('admin.booking.list',compact('data'));
    }

    public function create()
    {
        $hotels = Hotel::where("is_enable",1)->get();
        $payment_types = PaymentType::where("is_enable",1)->get();
        $booking_types = BookingType::where("is_enable",1)->get();

        return view("admin.booking.create",compact("payment_types","hotels","booking_types"));
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Booking $booking)
    {

    }

    public function edit(Booking $booking)
    {
        //
    }

    public function update(Request $request, Booking $booking)
    {
        //
    }

    public function destroy(Booking $booking)
    {
        //
    }
}
