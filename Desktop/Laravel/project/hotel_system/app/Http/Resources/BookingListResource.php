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
        return [
          "id" => $this->id,
          "checkInDate" => $this->check_in_date,
          "checkOutDate" => $this->check_out_date,
          "hotel" => [
              'id' => $this->hotel->id,
              'title' => $this->hotel->name,
              'city' => $this->hotel->city,
              'country' => $this->hotel->country,
              'description' => $this->hotel->description,
          ],
          "roomType" => RoomTypeBookingResource::collection($this->room_types)
        ];
    }
}
