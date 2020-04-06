<?php

namespace App\Requests;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->attributes->has('password')) {
            return [
                'username' => 'sometimes|max:50|alpha_num|unique:users,username,' . $this->user()->id,
                'email' => 'sometimes|email|max:255|unique:users,email,' . $this->user()->id,
                'password'=>'sometimes|string|min:6|confirmed',
                'first_name' => 'sometimes|nullable|max:255',
                'last_name' => 'sometimes|nullable|max:255',
            ];
        }
        else{
            return [
                'username' => 'sometimes|max:50|alpha_num|unique:users,username,' . $this->user()->id,
                'email' => 'sometimes|email|max:255|unique:users,email,' . $this->user()->id,
                'first_name' => 'sometimes|nullable|max:255',
                'last_name' => 'sometimes|nullable|max:255',
            ];
        }
       
    }
}
