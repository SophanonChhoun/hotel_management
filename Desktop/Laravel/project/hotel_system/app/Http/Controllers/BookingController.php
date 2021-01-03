<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingOfferRequest;
use App\Http\Requests\BookingStoreRequest;
use App\Http\Resources\BookingListResource;
use App\Http\Resources\BookingShowResource;
use App\Http\Resources\BookingTypeResource;
use App\Http\Resources\HotelBookResource;
use App\Http\Resources\PaymentTypeResource;
use App\Http\Resources\RoomResource;
use App\Http\Resources\RoomTypeBookResource;
use App\Http\Resources\RoomTypeResource;
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
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use DateTime;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $bookings = Booking::with("hotel", "booking_type", "customer");
        if (isset($request->search)) {
            $bookings = $bookings->where("name", "LIKE", "%" . $request->search . "%");
        }
        if (isset($request->is_enable)) {
            $bookings = $bookings->where("is_enable", $request->is_enable);
        }
        $data = $bookings->orderByDesc("id")->simplePaginate(10);
        return view('admin.booking.list', compact('data'));
    }

    public function listCustomer(Request $request)
    {
        try {

            $bookings = Booking::with("hotel","room", "customer", "room_types.medias","room_types.rooms","payment_type","booking_type")->where("customer_id", $request['auth_id'])->orderByDesc("id")->get();
            $bookings = $bookings->map(function ($booking) {
                $date1 = new DateTime($booking->check_in_date);
                $date2 = new DateTime($booking->check_out_date);
                $int = $date1->diff($date2);
                $days = $int->format("%a");
                $booking['days'] = $days;
                $total = Arr::pluck($booking->room_types,'price');
                $booking['total'] = array_sum($total) * $days;
                $roomIds = Arr::pluck($booking->room,"id");
                $booking->room_types = $booking->room_types->map(function ($room_type) use ($roomIds){
                    $room_type->room = $room_type->rooms->filter(function ($room) use($roomIds){
                        if(in_array($room->id,$roomIds)){
                            return $room;
                        }
                    });
                    return $room_type;
                });
                return $booking;
            });
            return $this->success(BookingListResource::collection($bookings));
        } catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function bookingStay()
    {
        try {
            $hotel = Hotel::where("is_enable", 1)->get();

            return $this->success([
                "hotels" => HotelBookResource::collection($hotel),
            ]);
        } catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function bookingOffer(BookingOfferRequest $request)
    {
        try {
            $roomTypes = RoomType::where("hotel_id",$request->hotel_id)->where("is_enable",1)->get();

            if(!$roomTypes || count($roomTypes) == 0)
            {
                return $this->fail("There are no room type for this hotel.");
            }

            $roomTypes = $roomTypes->filter(function($roomType) use ($request) {
                $booking = Booking::where("check_in_date","<=",$request->checkOutDate)
                    ->where("check_out_date",">",$request->checkInDate)->where("is_enable",1)->get();
                $bookingIDs= $booking->pluck("id");
                $rooms = BookingHasRooms::whereIn("booking_id",$bookingIDs)->get();
                $roomIDs = $rooms->pluck("room_id");
                $rooms = Room::with("roomType")->where("status",1)->whereNotIn("id",$roomIDs)->where("roomType_id",$roomType['id'])->get();
                $roomType['qtyAvailable'] = $rooms->count();
                if($rooms->count() > 0)
                {
                    return $roomType;
                }
            });

            $payment_types = PaymentType::where("is_enable",1)->get();
            return $this->success([
                "hotel_id" => $request->hotel_id,
                "roomTypes" => RoomResource::collection($roomTypes),
                "paymentType" => PaymentTypeResource::collection($payment_types)
            ]);
        } catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function showPayment($id)
    {
        try {
            $payment = Payment::with("booking","booking.room.roomType","customer");
            $payment = $payment->where("booking_id",$id)->first();
            if(!$payment)
            {
                return redirect("/admin/dashboard");
            }
            $total = Arr::pluck($payment->booking->room,"roomType");
            $total = Arr::pluck($total,'price');
            $payment['total'] = array_sum($total);
            return view('admin.payment.show',compact('payment'));
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }

    public function create()
    {
        $current_date = date('d/m/Y');
        $hotels = Hotel::where("is_enable", 1)->get();
        $payment_types = PaymentType::where("is_enable", 1)->get();
        $booking_types = BookingType::where("is_enable", 1)->get();
        $customers = Customer::where("is_enable", 1)->get();
        $customers = $customers->filter(function ($customer) {
            $customer['name'] = $customer['last_name'] . " " . $customer['first_name'];
            return $customer;
        });
        $room_types = RoomType::where("is_enable", 1)->get();
        $rooms = Room::where("is_enable", 1)->where("status",1)->get();
        return view("admin.booking.create", compact(
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
                'check_in_date' => Carbon::parse($request['check_in_date'])->format('Y-m-d'),
                'check_out_date' => Carbon::parse($request['check_out_date'])->format('Y-m-d'),
                'booking_type_id' => $request['booking_type_id'],
                'is_enable' => $request['is_enable'],
                'hotel_id' => $request['hotel_id'],
                'customer_id' => $request['customer_id'],
                'payment_type_id' => $request['payment_type_id']
            ];
            $data = Booking::create($booking);
            BookingHasRooms::store($data->id, $request['rooms']);
            BookingRoomTypeMap::store($data->id, $request['room_type_id']);
            $amount = count($request['rooms']);
            Payment::store($data->id, $amount, $request['customer_id']);
            DB::commit();
            return $this->success($data);
        } catch (Exception $exception) {
            DB::rollBack();
            return $this->fail($exception->getMessage());
        }
    }

    public function storeCustomer(Request $request)
    {
        DB::beginTransaction();
        try {
            $bookingType = BookingType::where("name","online")->first();
            $booking = [
              'check_in_date' => Carbon::parse($request['check_in_date'])->format('Y-m-d'),
              'check_out_date' => Carbon::parse($request['check_out_date'])->format('Y-m-d'),
              'hotel_id' => $request['hotel_id'],
              'customer_id' => $request['auth_id'],
              'is_enable' => 1,
              'booking_type_id' => $bookingType->id,
              'payment_type_id' => $request['payment_type_id']
            ];
            $data = Booking::create($booking);
            $amount = count(Arr::pluck($request['roomTypes'],"quantity"));
            $booking = Booking::where("check_out_date",">",$request['check_in_date'])->where("check_in_date","<",$request['check_out_date'])->get();
            $booking = $booking->pluck("id");
            $roomIDs = BookingHasRooms::whereIn("booking_id",$booking)->get();
            $roomIDs = $roomIDs->pluck("room_id");
            foreach ($request['roomTypes'] as $roomType)
            {
                $room = Room::where("roomType_id",$roomType['id'])
                    ->where("status",1)
                    ->where("hotel_id",$request['hotel_id'])
                    ->whereNotIn("id",$roomIDs)
                    ->limit($roomType['quantity'])->get();
                if(count($room) < $roomType['quantity'])
                {
                    $roomType = RoomType::find($roomType['id']);
                    return $this->fail("This room type ".$roomType->name." does not have enough room.");
                }
                $roomIDs = $room->pluck("id");
                $roomSave= BookingHasRooms::storeCustomer($data->id,$roomIDs);
            }
            $roomTypeIDs = Arr::pluck($request['roomTypes'],"id");
            BookingRoomTypeMap::store($data->id, $roomTypeIDs);
            Payment::store($data->id, $amount, $request['auth_id']);
            $booking = Booking::payment($request['roomTypes'],$data->id);
            $date1 = new DateTime($request->check_in_date);
            $date2 = new DateTime($request->check_out_date);
            $int = $date1->diff($date2);
            $days = $int->format("%a");
            DB::commit();
            return $this->success([
                "total" => $booking['total'] * $days,
                "booking" => [
                    "check_in_date" => $booking['booking']->check_in_date ?? null,
                    "check_out_date" => $booking['booking']->check_out_date ?? null,
                    "booking_type" => $booking['booking']->booking_type->name ?? null,
                    "payment_type" => $booking['booking']->payment_type->name ?? null,
                    "hotel" => $booking['booking']->hotel->name ?? null,
                    "customer_first_name" => $booking['booking']->customer->first_name ?? null,
                    "customer_last_name" => $booking['booking']->customer->last_name ?? null,
                    "roomType" => RoomTypeResource::collection($booking['booking']->room_types)
                ]
            ]);
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
            Room::whereIn("id",$request['rooms'])->update([
                'is_enable' => 0
            ]);
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
        DB::beginTransaction();
        try {
            $booking = Booking::find($id);
            $payment=Payment::find($booking->id);
            if($payment)
            {
                $payment->delete();
            }
            $booking->delete();
            DB::commit();
            return back();
        }catch (Exception $e){
            DB::rollBack();
            return $this->fail($e->getMessage());
        }
    }
}
