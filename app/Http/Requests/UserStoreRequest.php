<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'email' => 'required|email',
            'active' => 'required',
            'password' => 'required|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Il Nome è obbligatorio',
            'last_name.required' => 'Il Cognome è obbligatorio',
            'email.required' => 'Email è obbligatoria',
            'email.email' => 'Il formato non è valido',
            'active.required' => 'Lo Status è obbligatorio',
            'password.required' => 'La Password è obbligatoria',
            'password.confirmed' => 'La Password è confermata'
        ];
    }
}
