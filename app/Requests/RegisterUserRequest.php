<?php

namespace App\Requests;
use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->input('role_id') == "3")
        {
            return [
                'username' => 'required|max:50|alpha_num|unique:users,username,',
                'email' => 'required|email|max:255|unique:users,email,' ,
                'password' => 'required|min:6',
                'first_name' => 'required|string|max:255|',
                'last_name' => 'required|string|max:255|',
            ];
        }
        else if($this->input('role_id') == "2")
        {
            return [
                'username' => 'required|max:50|alpha_num|unique:users,username,' ,
                'email' => 'required|email|max:255|unique:users,email,',
                'password' => 'required|min:6',
                'first_name' => 'required|string|max:255|',
                'last_name' => 'required|string|max:255|',
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
