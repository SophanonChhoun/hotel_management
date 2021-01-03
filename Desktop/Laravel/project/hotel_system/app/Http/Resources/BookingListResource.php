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
//        return $this->only('id', 'total','check_in_date','check_out_date', 'booking_type_name','payment_type_name'
//            ) + [
//            'hotel' => [
//                "id" => $this->hotel->id ?? null,
//                "name" => $this->hotel->name ?? null,
//                "media" => MediasResource::collection($this->hotel->medias) ?? null,
//            ] + [
//            "customer_first_name" => $this->customer->first_name,
//            "customer_last_name" => $this->customer->last_name,
//            "roomType" => RoomTypeResource::collection($this->room_types),
//        ]
//    ];
        return [
          "id" => $this->id,
          "total" => $this->total,
          "check_in_date" => $this->check_in_date,
          "check_out_date" => $this->check_out_date,
          "booking_type_name" => $this->booking_type->name,
          "customer_first_name" => $this->customer->first_name,
          "customer_last_name" => $this->customer->last_name,
          "hotel" => [
              "id" => $this->hotel->id ?? null,
              "name" => $this->hotel->name ?? null,
              "media" => MediasResource::collection($this->hotel->medias) ?? null,
          ],
        "roomType" => RoomTypeResource::collection($this->room_types),
        ];

    }
}
