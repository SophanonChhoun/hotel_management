<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use DateTime;

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

    public static function showPayment($id)
    {
        $payment = self::with("booking","booking.room.roomType","customer");

        $payment = $payment->find($id);
        $total = Arr::pluck($payment->booking->room,"roomType");
        $total = Arr::pluck($total,'price');
        $date1 = new DateTime($payment->booking->check_in_date);
        $date2 = new DateTime($payment->booking->check_out_date);
        $int = $date1->diff($date2);
        $days = $int->format("%a");
        $payment['days'] = $days;
        $payment['total'] = array_sum($total) * $days;

        return $payment;
    }
}
