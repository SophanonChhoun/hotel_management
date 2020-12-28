<?php

namespace App\Models\admin;

use App\Models\admin\MediaFile;
use App\Models\ProjectMediaMap;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "price",
        "media_id",
        "is_enable",
        "hotel_id",
        "max"
    ];

    public function medias()
    {
        return $this->belongsToMany(MediaFile::class, RoomTypeMediaMap::class, 'room_type_id', 'media_id');
    }
    public function hotel()
    {
        return $this->belongsTo(Hotel::class,"hotel_id","id");
    }

    public function rooms()
    {
        return $this->hasMany(Room::class,"roomType_id","id");
    }
}
