<?php

namespace App\Http\Requests;

class VideoRequest extends Request
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
        return [
            'video_url' => 'required|url|',
            'video_title' => 'required' ,
            'description' => 'required',
            'tag' => 'sometimes|nullable',
        ];
    }
}
