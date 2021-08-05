<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DriverUpdateRequest extends FormRequest
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
            'age' => 'required',
            'active' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'L\'User è obbligatorio',
            'age.required' => 'L\'Età è obbligatoria',
            'active.required' => 'Lo Status è obbligatorio',
        ];
    }
}
