<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VolunteerUpdateRequest extends FormRequest
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
            'first_name',
            'last_name',
            'date_of_birth',
            'gender',
            'document_tipology',
            'document_type',
            'feature_tipology',
            'training',
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
