<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
          "check_in_date" => $this->booking->check_in_date ?? null,
          "check_out_date" => $this->booking->check_out_date ?? null,
          "booking_type" => $this->booking_type->name ?? null,
          "payment_type" => $this->payment_type->name ?? null,
          "hotel" => $this->hotel->name ?? null,
//          "room_types" => RoomTypeResource::collection($this->room_types)
        ];
    }
}
