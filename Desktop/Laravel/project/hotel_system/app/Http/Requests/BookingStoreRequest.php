<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\DefaultFormRequest;

class BookingStoreRequest extends DefaultFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'check_in_date' => 'required',
            'check_out_date' => 'required',
            'hotel_id' => 'required',
            'payment_type_id' => 'required',
            'rooms' => 'required|array',
            'room_types_id' => 'required|array'
        ];
    }
}
