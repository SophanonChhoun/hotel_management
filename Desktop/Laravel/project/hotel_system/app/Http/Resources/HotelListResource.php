<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HotelListResource extends JsonResource
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
          'id' => $this->id,
          'title' => $this->name,
          'city' => $this->city,
          'country' => $this->country,
          'description' => $this->description,
          'imageSrc' => $this->medias->first()->file_url ?? null,
          'imageAlt' => "image",
        ];
    }
}
