<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
            'username' => 'required|max:255|min:4',
            'password' => 'required|max:255|min:6',
        ];
    }
    
    public function messages()
    {
        return [
            'username.required' => 'Username not empty',
            'username.max' => 'Username <255 character',
            'username.min' => 'Username min 4 character',
            'password.required'  => 'Password not empty',
        ];
    }
}
