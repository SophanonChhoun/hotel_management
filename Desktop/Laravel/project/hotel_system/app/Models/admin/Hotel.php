<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    public $fillable = [
      'name',
      'street_address',
      'city',
      'country',
      'zip',
      'is_enable'
    ];
}
