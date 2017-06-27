<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateRequest extends Request
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
            'id' => 'required',
            'username' => 'required|max:255|min:4',
            'password' => 'required|confirmed|max:255|min:6',
            'password_confirmation' => 'required|max:255|min:6',
            'email' => 'required|email',
            'avatar' => 'mimes:jpeg,jpg,png',
        ];
    }
    
    public function messages()
    {
        return [
            'id.required' => 'Not find account!',
            'id.unique' => 'Not find account!',
            'username.required' => 'Username not empty!',
            'username.max' => 'Username <255 character!',
            'username.min' => 'Username >4 character!',
            'username.unique' => 'Username has been use by other user!',            
            'password.max' => 'Password <255 characters!',
            'password.min' => 'Password least 6 characters!',
            'password.required'  => 'Password not empty!',
            'password.confirmed'  => 'Password not equal Re-password!',
            'password_confirmation.required'  => 'Re-Password not empty!',
            'email.required'  => 'Email not empty!',
            'email.email'  => 'Please input email!',
            'email.unique'  => 'Email has been use by other user!',
            'avatar.mimes'  => 'Select image(jpeg,jpg,png)! ',
        ];
    }
}
