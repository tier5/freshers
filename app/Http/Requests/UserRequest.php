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
            'first_name'=>'required|min:2|alpha',
            'last_name'=>'required|min:2|alpha',
            'email'=>'required|Email|unique:users,email',
            'password'=>'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            'confirm_password'=>'required|same:password',
            'contact_no'=>'required|min:10|numeric',
            'date_of_birth'=>'required',
            'country'=>'required' ,
            'profile_picture'=>'image'
        ];
    }
}
