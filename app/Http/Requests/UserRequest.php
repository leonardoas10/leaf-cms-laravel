<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'username' => 'required|alpha|min:3',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required|min:8',
            'firstname' => 'required|alpha|min:3',
            'lastname' => 'required|alpha|min:3',
            'email' => 'required|email|min:3',
            'role' => 'required|starts_with:Admin,Subscriber|ends_with:Admin,Subscriber|alpha',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
