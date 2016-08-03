<?php

namespace App\Http\Requests;
use Auth;
use App\Http\Requests\Request;

class PostHotelRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5|max:255|string',
            'image' => 'required|mimes:jpeg,jpg,png',
            'description' => 'required|min:1'
        ];
    }
}
