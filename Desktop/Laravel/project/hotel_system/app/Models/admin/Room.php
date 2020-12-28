<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "is_enable",
        "hotel_id",
        "roomType_id",
        "status"
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class,"hotel_id","id");
    }

    public function roomType()
    {
        return $this->belongsTo(RoomType::class,"roomType_id","id");
    }

    public function bookies()
    {
        return $this->belongsToMany(Booking::class,BookingHasRooms::class,"room_id","booking_id");
    }
}
