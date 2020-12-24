<?php

namespace App\Http\Controllers;

use App\Models\admin\Booking;
use App\Models\admin\BookingHasRooms;
use App\Models\admin\BookingRoomTypeMap;
use App\Models\admin\BookingType;
use App\Models\admin\Customer;
use App\Models\admin\Hotel;
use App\Models\admin\Payment;
use App\Models\admin\PaymentType;
use App\Models\admin\Room;
use App\Models\admin\RoomType;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $bookings = Booking::with("hotel","booking_type","customer");
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
        $current_date = date('d/m/Y');
        $hotels = Hotel::where("is_enable",1)->get();
        $payment_types = PaymentType::where("is_enable",1)->get();
        $booking_types = BookingType::where("is_enable",1)->get();
        $customers = Customer::where("is_enable",1)->get();
        $customers = $customers->filter(function ($customer){
            $customer['name']= $customer['last_name'] . " " . $customer['first_name'];
            return $customer;
        });
        $room_types = RoomType::where("is_enable",1)->get();
        $rooms = Room::where("is_enable",1)->get();
        return view("admin.booking.create",compact(
            "payment_types",
            "hotels",
            "booking_types",
            "customers",
            "room_types",
            "rooms",
            "current_date"
        ));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $booking = [
                'check_in_date' => $request['check_in_date'],
                'check_out_date' => $request['check_out_date'],
                'booking_type_id' => $request['booking_type_id'],
                'is_enable' => $request['is_enable'],
                'hotel_id' => $request['hotel_id'],
                'customer_id' => $request['customer_id'],
                'payment_type_id' => $request['payment_type_id']
            ];
            $data = Booking::create($booking);
            BookingHasRooms::store($data->id,$request['rooms']);
            BookingRoomTypeMap::store($data->id,$request['room_type_id']);
            $amount = count($request['rooms']);
            Payment::store($data->id,$amount,$request['customer_id']);
            DB::commit();
            return $this->success($data);
        }catch (Exception $exception){
            DB::rollBack();
            return $this->fail($exception->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $booking = Booking::with("hotel","booking_type","customer","room","payment_type","room_types")->find($id);
            $booking->room_id = $booking->room->map(function($room){
                return $room->id;
            });
            $booking->customer->name = $booking->customer->last_name . " " . $booking->customer->first_name;
            $current_date = date('d/m/Y');
            $hotels = Hotel::where("is_enable",1)->get();
            $payment_types = PaymentType::where("is_enable",1)->get();
            $booking_types = BookingType::where("is_enable",1)->get();
            $customers = Customer::where("is_enable",1)->get();
            $customers = $customers->filter(function ($customer){
                $customer['name']= $customer['last_name'] . " " . $customer['first_name'];
                return $customer;
            });
            $room_types = RoomType::where("is_enable",1)->get();
            $rooms = Room::where("is_enable",1)->get();
            return view("admin.booking.edit",compact(
                "booking",
                "payment_types",
                "hotels",
                "booking_types",
                "customers",
                "room_types",
                "rooms",
                "current_date"
            ));
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = Booking::find($id);
            $booking = [
                'check_in_date' => $request['check_in_date'],
                'check_out_date' => $request['check_out_date'],
                'booking_type_id' => $request['booking_type_id'],
                'is_enable' => $request['is_enable'],
                'hotel_id' => $request['hotel_id'],
                'customer_id' => $request['customer_id'],
                'payment_type_id' => $request['payment_type_id']
            ];
            $data = $data->update($booking);
            BookingHasRooms::store($id,$request['rooms']);
            BookingRoomTypeMap::store($id,$request['room_type_id']);
            $amount = count($request['rooms']);
            Payment::store($id,$amount,$request['customer_id']);
            DB::commit();
            return $this->success($data);
        }catch (Exception $exception){
            DB::rollBack();
            return $this->fail($exception->getMessage());
        }
    }

    public function updateStatus(Request $request,$id)
    {
        try {
            Booking::find($id)->update([
                "is_enable" => $request->is_enable
            ]);
            Payment::status($id,$request->is_enable);
            return back();
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            Booking::findOrFail($id)->delete();
            Payment::status($id);
            return back();
        }catch (Exception $e){
            return $this->fail($e->getMessage());
        }
    }
}
