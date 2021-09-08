<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationHotelStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'arrival_date' => 'required',
            'departure_date' => 'required',
            'num_pax' => 'required',
            'room_type' => 'required',
            'price' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'arrival_date.required' => 'L\' Arrival Date è obbligatoria',
            'departure_date.required' => 'La Departure Date è obbligatoria',
            'num_pax.required' => 'Il Num Pax è obbligatorio',
            'room_type.required' => 'La Room Type è obbligatoria',
            'price.required' => 'Il Price è obbligatorio',
        ];
    }
}
