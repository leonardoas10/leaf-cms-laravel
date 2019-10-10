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
            'title' => 'required|regex:/^[\pL?\s]+$/u|unique:posts',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required',
            'tags' => 'required|regex:/^[\pL\s]+$/u',
            'status' => 'required|starts_with:Published,Draft|ends_with:Published,Draft|alpha',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
