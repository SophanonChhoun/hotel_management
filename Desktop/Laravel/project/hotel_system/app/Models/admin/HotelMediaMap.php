<?php

namespace App\Models\admin;

use App\Core\MediaLib;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelMediaMap extends Model
{
    use HasFactory;


    protected $table = 'hotel_media_maps';
    protected $fillable = [
        'hotel_id',
        'media_id'
    ];


    public function media()
    {
        return $this->belongsTo(MediaFile::class,"media_id","media_id");
    }

    public static function store($medias, $id)
    {
        self::where('hotel_id', $id)->delete();
        foreach ($medias as $key => $media) {
            if(isset($media['image']))
            {
                $media['media_id'] = MediaLib::generateImageBase64($media['image']);
            }
            self::create([
                'hotel_id' => $id,
                'media_id' => $media['media_id'],
            ]);
        }
    }
}
