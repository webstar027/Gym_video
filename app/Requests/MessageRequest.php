<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sender' => 'required',
            "receiver" => "required",
            "msg" => "required"
        ];
    }
}
