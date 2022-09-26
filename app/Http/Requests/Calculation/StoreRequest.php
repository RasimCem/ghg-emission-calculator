<?php

namespace App\Http\Requests\Calculation;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id' => 'nullable',
            "facility_id" => "required",
            "fuel_type_id" => "required",
            "unit_id" => "required",
            "year" => "required",
            "amount_of_fuel" => "required"
        ];
    }
}
