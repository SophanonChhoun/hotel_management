<?php

namespace App\Models\admin;

use App\Models\admin\Hotel;
use App\Models\admin\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\BookingType;
use App\Models\admin\PaymentType;

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

    public function room()
    {
        return $this->belongsToMany(Room::class, BookingHasRooms::class, 'booking_id', 'room_id');
    }

    public function room_types()
    {
        return $this->belongsToMany(RoomType::class,BookingRoomTypeMap::class,"booking_id","room_type_id");
    }
}
