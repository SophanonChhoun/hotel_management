<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\DefaultFormRequest;


class BookingOfferRequest extends DefaultFormRequest
{

    public function rules()
    {
        return [
            'hotel_id' => 'required'
        ];
    }
}
