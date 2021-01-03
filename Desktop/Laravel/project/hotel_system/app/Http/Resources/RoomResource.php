<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id ?? null,
            "name" => $this->name ?? null,
            "description" => $this->description ?? null,
            "price" => $this->price ?? null,
            "max" => $this->max ?? null,
            "qtyAvailable" => $this->qtyAvailable ?? null
        ];
    }
}
