<?php

namespace App\Models\admin;

use App\Core\MediaLib;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'street_address',
      'city',
      'country',
      'zip',
      'is_enable',
      'media_id'
    ];

    public function media()
    {
        return $this->belongsTo(MediaFile::class,"media_id","media_id");
    }
}
