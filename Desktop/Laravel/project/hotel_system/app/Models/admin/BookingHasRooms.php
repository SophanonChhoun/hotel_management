<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingHasRooms extends Model
{
    use HasFactory;
    protected $table='booking_has_rooms';

    protected $fillable = ['booking_id','room_id'];


    public static function store($booking_id,$roomIDs)
    {
        self::where("booking_id",$booking_id)->delete();
        foreach ($roomIDs as $roomID)
        {
            self::create([
                "booking_id" => $booking_id,
                "room_id" => $roomID
            ]);
            Room::find($roomID)->update([
                'is_enable' => 0
            ]);
        }
    }

    public static function storeCustomer($booking_id,$roomIDs)
    {
        foreach ($roomIDs as $roomID)
        {
            self::create([
                "booking_id" => $booking_id,
                "room_id" => $roomID
            ]);
            Room::find($roomID)->update([
                'is_enable' => 0
            ]);
        }
    }
}
