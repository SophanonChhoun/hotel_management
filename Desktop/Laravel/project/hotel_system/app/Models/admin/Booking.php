<?php

namespace App\Models\admin;

use App\Models\admin\Hotel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\BookingType;
use App\Models\admin\PaymentType;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
      'customer_id',
      'check_in_date',
      'check_out_date',
      'booking_type_id',
      'is_enable',
      'hotel_id'
    ];


    public function hotel()
    {
        return $this->belongsTo(Hotel::class,"hotel_id","id");
    }

    public function booking_type()
    {
        return $this->belongsTo(BookingType::class,"booking_type_id","id");
    }

}
