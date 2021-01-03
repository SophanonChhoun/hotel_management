<?php

namespace App\Models\admin;

use App\Models\admin\Hotel;
use App\Models\admin\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\BookingType;
use App\Models\admin\PaymentType;
use Illuminate\Support\Arr;
use DateTime;


class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'check_in_date',
        'check_out_date',
        'booking_type_id',
        'is_enable',
        'hotel_id',
        'payment_type_id'
    ];

    public function getBookingTypeNameAttribute()
    {
        return $this->booking_type->name ?? '';
    }

    public function getPaymentTypeNameAttribute()
    {
        return $this->payment_type->name ?? null;
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class,"hotel_id","id");
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class,"customer_id","id");
    }

    public function booking_type()
    {
        return $this->belongsTo(BookingType::class,"booking_type_id","id");
    }


    public function payment_type()
    {
        return $this->belongsTo(PaymentType::class,"payment_type_id","id");
    }

    public function rooms()
    {
        return $this->hasManyThrough(
            Room::class,
            BookingHasRooms::class,
            'booking_id',
            'id',
            'id',
            'room_id'
        );
    }

    public function room()
    {
        return $this->belongsToMany(Room::class, BookingHasRooms::class, 'booking_id', 'room_id');
    }

    public function room_types()
    {
        return $this->belongsToMany(RoomType::class,BookingRoomTypeMap::class,"booking_id","room_type_id");
    }

    public function payment_booking()
    {
        return $this->belongsTo(Payment::class,"id","booking_id");
    }



    public static function payment($roomTypes, $booking_id)
    {
        $total = 0;
        foreach ($roomTypes as $roomType)
        {
            $price = RoomType::find($roomType['id'])->price;
            $total += ($price * $roomType['quantity']);
        }

        $booking = Booking::with("hotel","booking_type","customer","payment_type","room_types.rooms")->find($booking_id);
        return [
            "total" => $total,
            "booking" => $booking
        ];
    }

    public static function list($bookings)
    {
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
        return $bookings;
    }
}
