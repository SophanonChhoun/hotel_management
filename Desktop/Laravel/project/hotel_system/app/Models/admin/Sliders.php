<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sliders extends Model
{
    use HasFactory;

    protected $fillable = [
        'media_id',
        'is_enable',
        'hotel_id',
        'caption',
        'title',
        'description'
    ];

    public function media()
    {
        return $this->hasOne(MediaFile::class,"media_id","media_id");
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class,"hotel_id","id");
    }
}
