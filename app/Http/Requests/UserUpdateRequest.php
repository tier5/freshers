<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserUpdateRequest extends Request
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
            'contact_number'=>'required|min:10|numeric',
            'country_id'=>'required',
            'profile_picture' => 'image'
        ];
    }
}
