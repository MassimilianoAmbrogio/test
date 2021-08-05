<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleStoreRequest extends FormRequest
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
            'driver_id' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'active' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'driver_id.required' => 'Il Driver è obbligatorio',
            'brand.required' => 'Il Brand è obbligatorio',
            'model.required' => 'Il Model è obbligatorio',
            'active.required' => 'Lo Status è obbligatorio',
        ];
    }
}
