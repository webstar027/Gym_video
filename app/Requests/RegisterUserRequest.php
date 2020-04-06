<?php

namespace App\Http\Requests;

class RegisterUserRequest extends Request
{
    /**
     * Get data to be validated from the request.
     *
     * @return array
     */
    protected function validationData()
    {
        return $this->get('video') ?: [];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->attributes->get('role_id') == 3)
        {
            return [
                'username' => 'required|max:50|alpha_num|unique:users,username,',
                'email' => 'required|email|max:255|unique:users,email,' ,
                'password' => 'required|min:6',
                'first_name' => 'reqired|string|max:255|',
                'last_name' => 'reqired|string|max:255|',
            ];
        }
        else if($this->attributes->get('role_id') == 3)
        {
            return [
                'username' => 'required|max:50|alpha_num|unique:users,username,' ,
                'email' => 'required|email|max:255|unique:users,email,',
                'password' => 'required|min:6',
                'first_name' => 'reqired|string|max:255|',
                'last_name' => 'reqired|string|max:255|',
                // gym validate
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
}
