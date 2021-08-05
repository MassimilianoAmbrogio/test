<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationStoreRequest extends FormRequest
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
            'accommodation_id' => 'required',
            'room_id' => 'required',
            'arrival_date' => 'required',
            'nights' => 'required',
            'qty' => 'required',
            'active' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'accommodation_id.required' => 'L\'Accommodation è obbligatorio',
            'room_id.required' => 'La Stanza è obbligatoria',
            'arrival_date.required' => 'La Data di arrivo è obbligatoria',
            'nights.required' => 'La Notte è obbligatoria',
            'qty.required' => 'La Quantità è obbligatoria',
            'active.required' => 'Lo Status è obbligatorio',
        ];
    }
}
