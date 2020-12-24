<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'booking_id',
        'amount',
        'is_enable',
        "customer_id"
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class,"booking_id","id");
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class,"customer_id","id");
    }

    public static function store($booking_id,$amount,$customer_id)
    {
        self::where("booking_id",$booking_id)->delete();
        self::create([
           "booking_id" => $booking_id,
           "amount" => $amount,
           "is_enable" => 1,
           "customer_id" => $customer_id
        ]);
    }

    public static function status($booking_id,$value = 2)
    {
        self::where("booking_id",$booking_id)->update([
           "is_enable" => $value
        ]);
    }
}
