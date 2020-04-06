<?php

namespace App\Requests;
use Illuminate\Foundation\Http\FormRequest;

class UpdateGymRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'gym_name' => 'required|string|max:255',
            'gym_address_1' => 'required|string',
            'gym_address_2' => 'sometimes|nullable|string',
            'city' => 'required|string|max:255',
            'state_province' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'zip_code' => 'required|string|max:255',
            'website' => 'sometimes|nullable|url',
        ];
    }
}
