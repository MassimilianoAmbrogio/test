<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArrClusterStoreRequest extends FormRequest
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
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'last_name' => 'required',
            'name' => 'required',
            'active' => 'required',
            'age' => 'required',
            'city' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'last_name.required' => 'Il Cognome è obbligatorio',
            'name.required' => 'Il Nome è obbligatorio',
            'active.required' => 'Lo Status è obbligatorio',
            'age.required' => 'L\'Età è obbligatoria',
            'city.required' => 'La Città è obbligatoria',
        ];
    }
}
