<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArrivalsDeparturesMeanUpdateRequest extends FormRequest
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
            'active' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il Nome è obbligatorio',
            'active.required' => 'Lo Status è obbligatorio',
        ];
    }
}
