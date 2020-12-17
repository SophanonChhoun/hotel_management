<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sliders extends Model
{
    use HasFactory;

    protected $fillable = ['media_id','is_enable'];

    public function media()
    {
        return $this->hasOne(MediaFile::class,"media_id","media_id");
    }
}
