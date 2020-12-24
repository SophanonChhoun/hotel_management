<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingRoomTypeMap extends Model
{
    use HasFactory;
    protected $fillable = ['booking_id','room_type_id'];


    public static function store($booking_id,$roomTypeIDs)
    {
        self::where("booking_id",$booking_id)->delete();
        foreach ($roomTypeIDs as $roomID)
        {
            self::create([
                "booking_id" => $booking_id,
                "room_type_id" => $roomID
            ]);
        }
    }
}
