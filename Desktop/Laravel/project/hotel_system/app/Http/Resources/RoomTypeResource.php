<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoomTypeResource extends JsonResource
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
          "name" => $this->name,
          "price_per_room" => $this->price,
          "quantity" => count($this->rooms),
          "total" => count($this->rooms) * $this->price,
          "maximum" => $this->max,
          "rooms" => RoomBookingResource::collection($this->rooms)
        ];
    }
}
