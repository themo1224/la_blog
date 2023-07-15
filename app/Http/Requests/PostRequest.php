<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title'=>'required|string|max:50',
            'content'=>'required|min:8',
            'meta_title'=>'max:50',
            'image' => 'required|image|mimes:jpeg,png,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'The content field is required.',
            'title.required'  => 'the title is required',
            'content.min'   => 'the content should be 8 char',
            'image.required'  => 'the title is required',
            'image.mimes'  => 'the image should be png, jpg',
        ];
    }
}
