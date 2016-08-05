<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;
class PostVenueRequest extends Request
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
            'name' =>'required|min:2|string',
            'slug' => 'required|unique:venues|min:5|max:255|string',
            'image' => 'mimes:jpeg,bmp,png',
            'description' => 'required',
        ];
    }
}
