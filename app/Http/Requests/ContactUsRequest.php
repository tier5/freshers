<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContactUsRequest extends Request
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
            'first_name'=>'required|alpha|min:2',
            'last_name'=>'required|min:2|alpha',
            'email'=>'required|Email',
            'phone'=>'required|min:10|numeric',
            'message'=>'required|min:20'
        ];
    }
}
