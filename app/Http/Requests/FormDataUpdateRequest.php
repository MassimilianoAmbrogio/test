<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormDataUpdateRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'number_flight_arrival' => 'required',
            'airline_arrival' => 'required',
            'departure_city' => 'required',
            'arrival_date' => 'required',
            'arrival_hour' => 'required',
            'number_flight_departure' => 'required',
            'airline_departure' => 'required',
            'arrival_city' => 'required',
            'departure_date' => 'required',
            'departure_hour' => 'required',
            'passport_number' => 'required',
            'passport_expiry_date' => 'required',
            'special_request' => 'required',
            'active' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Il Name è obbligatorio',
            'last_name.required' => 'Il Last Name è obbligatorio',
            'number_flight_arrival.required' => 'Il Number Flight Arrival è obbligatorio',
            'airline_arrival.required' => 'L\' Airline Arrival è obbligatorio',
            'departure_city.required' => 'La Departure City è obbligatoria',
            'arrival_date.required' => 'L\' Arrival Date è obbligatoria',
            'arrival_hour.required' => 'L\' Arrival Hour è obbligatoria',
            'number_flight_departure.required' => 'Il Number Flight Departure è obbligatorio',
            'airline_departure.required' => 'L\' Airline Departure è obbligatorio',
            'arrival_city.required' => 'L\' Arrival City è obbligatoria',
            'departure_date.required' => 'La Departure Date è obbligatoria',
            'departure_hour.required' => 'La Departure Hour è obbligatoria',
            'passport_number.required' => 'Il Passport Number è obbligatorio',
            'passport_expiry_date.required' => 'Il Passport Expiry Date è obbligatorio',
            'special_request.required' => 'La Special Request è obbligatoria',
            'active.required' => 'Lo Status è obbligatorio'
        ];
    }
}
