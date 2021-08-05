<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArrivalsDepartureUpdateRequest extends FormRequest
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
            'user_id' => 'required',
            'arrival_departure_id' => 'required',
            'transport_id' => 'required',
            'date_arrival_departure' => 'required',
            'hour_arrival_departure' => 'required',
            'place_arrival_departure_id' => 'required',
            'active' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'L\' User è obbligatorio',
            'arrival_departure_id.required' => 'L\' Arrival\Departure è obbligatorio',
            'transport_id.required' => 'Il Transport è obbligatorio',
            'date_arrival_departure.required' => 'La Date Arrival\Date Departure è obbligatoria',
            'hour_arrival_departure.required' => 'L\' Hour Arrival\Hour Departure è obbligatoria',
            'place_arrival_departure_id.required' => 'Il Place Arrival\Place Departure è obbligatorio',
            'active.required' => 'Lo Status è obbligatorio',
        ];
    }
}
