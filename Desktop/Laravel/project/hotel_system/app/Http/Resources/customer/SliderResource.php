<?php

namespace App\Http\Resources\customer;

use Illuminate\Http\Resources\Json\JsonResource;

class SliderResource extends JsonResource
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
            "imageSrc" => $this->media->file_url ?? null,
            "imageAlt" => "image",
            "caption" => $this->caption,
            "title" => $this->title,
            "description" => $this->description,
            "hotelId" => $this->hotel_id
        ];
    }
}
