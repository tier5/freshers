<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SubdomainRequest extends Request
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
            'subdomain' => 'required|Regex:/^[A-Za-z0-9]+$/|unique:subdomains,subdomain',
            'theme' => 'required',
            'publish' => 'required'
        ];
    }
}
