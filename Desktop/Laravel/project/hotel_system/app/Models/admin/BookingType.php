<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingType extends Model
{
    use HasFactory;
    protected $fillable = ['name','is_enable'];
}
