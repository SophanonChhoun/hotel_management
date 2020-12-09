<?php

namespace App\Models\admin;

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
        "is_enable"
    ];


    public function media()
    {
        return $this->belongsTo(MediaFile::class,"media_id","media_id");
    }
}
