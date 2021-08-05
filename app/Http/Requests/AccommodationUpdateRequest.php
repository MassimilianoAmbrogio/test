<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccommodationUpdateRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
            'post_code' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'accommodation_type_id' => 'required',
            'user_id' => 'required',
            'accommodation_treatment_id' => 'required',
            'cluster_id' => 'required',
            'checkin_date' => 'required',
            'nights' => 'required',
            'active' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il Nome è obbligatorio',
            'description.required' => 'La Descrizione è obbligatoria',
            'address.required' => 'L\'Indirizzo è obbligatorio',
            'post_code.required' => 'Il Codice Postale è obbligatorio',
            'city.required' => 'La Città è obbligatoria',
            'phone.required' => 'Il Telefono è obbligatorio',
            'accommodation_type_id.required' => 'L\'Accommodation Type è obbligatorio',
            'user_id.required' => 'L\'User è obbligatorio',
            'accommodation_treatment_id.required' => 'L\'Accommodation Treatment è obbligatorio',
            'cluster_id.required' => 'Il Cluster è obbligatorio',
            'checkin_date.required' => 'Il Checkin Date è obbligatorio',
            'nights.required' => 'Le Nights sono obbligatorie',
            'active.required' => 'Lo Status è obbligatorio',
        ];
    }
}
