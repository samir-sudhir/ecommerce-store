<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
           'name'=>'required|string|min:2|max:255',
           'email'=>'required|email|unique:users|max:255',
           'password'=>'required|string|min:6|confirmed'
        ];
    }


    //messages
    public function messages()
    {
        return [
            'name.required'=>'Name field is required',
            'name.string'=>'Name must be string',
            'email.required'=>'Email field is required',
            'email.email'=>'Email must be in valid format!',
            'email.unique'=>'This Email is already registered',
            'password.min'=>'Password must be minimum 6 character in length',
            'password.required'=>'Password is required',

        ];
    }
}
