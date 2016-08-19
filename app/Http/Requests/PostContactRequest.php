<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostContactRequest extends Request
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
            'zone' => 'required|min:4',
            'district' => 'required|min:4',
            "representative" => 'required',
            'role' => 'required|min:3',
            'address' => 'required|min:3',
            'phone1' =>'required|min:6',
            'email' => 'required|email|min:5',
            'latitude' => 'required',
            'longitude' => 'required'
        ];
    }
}
