<?php

namespace App\Http\Requests;

class UpdateGymRequest extends Request
{
    /**
     * Get data to be validated from the request.
     *
     * @return array
     */
    protected function validationData()
    {
        return $this->get('gym') ?: [];
    }

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
