<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->only('id', 'total','check_in_date','check_out_date', 'booking_type_name','payment_type_name',
            'customer_name') + [
            'hotel' => [
                "id" => $this->hotel->id ?? null,
                "name" => $this->hotel->name ?? null,
            ],
            "customer_first_name" => $this->customer->first_name,
            "customer_last_name" => $this->customer->last_name,
            "roomType" => RoomTypeResource::collection($this->room_types)
        ];
    }
}
