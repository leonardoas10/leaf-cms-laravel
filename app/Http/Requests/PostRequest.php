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
            'title' => 'required|unique:posts|alpha',
            'category_id' => 'required|integer',
            'content' => 'required',
            'tags' => 'required|alpha',
            'status' => 'required|starts_with:Published,Draft|ends_with:Published,Draft|alpha',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
        // ends_with:foo,bar,...
        // starts_with:foo
    }
}
