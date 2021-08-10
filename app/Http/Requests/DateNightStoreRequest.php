<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DateNightStoreRequest extends FormRequest
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
            'data_inizio' => 'required',
            'numero_notti' => 'required',
            'data_fine' => 'required',
            'active' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'data_inizio.required' => 'La Data Inizio è obbligatoria',
            'numero_notti.required' => 'Il Numero Notti è obbligatorio',
            'data_fine.required' => 'La Data Fine è obbligatoria',
            'active.required' => 'Lo Status è obbligatorio',
        ];
    }
}
