<?php

namespace App\Http\Controllers;

use App\Models\admin\Room;
use Illuminate\Http\Request;
use Illuminate\Queue\RedisQueue;
use Illuminate\Support\Facades\DB;


class BookingOfferController extends Controller
{
    public function __invoke(Request $request)
    {
        try {
            $result = DB::table('rooms')
                ->whereNotIn('rooms.id', function ($query) use ($request) {
                    $query->select('room_id')->from('bookings')
                        ->where('check_in_date', '<=', $request->input('checkOutDate'))
                        ->where('check_out_date', '>=', $request->input('checkInDate'));
                })
                ->join('room_types', 'room_types.id', '=', 'rooms.roomType_id')
                ->distinct()
                ->where('rooms.hotel_id', '=', $request->input('hotel'))
                ->get();
            // TODO: Filter response to return only 1 of each room type
            return $this->success($result);
        } catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }
}
