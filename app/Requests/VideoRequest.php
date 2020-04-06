<?php

namespace App\Requests;
use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'video_url' => 'required',
            'video_title' => 'required' ,
            'description' => 'required',
            'tag' => 'sometimes',
        ];
    }
}
