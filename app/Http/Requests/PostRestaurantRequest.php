<?php

namespace App\Http\Requests;
use Auth;
class PostRestaurantRequest extends Request
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
            'slug' => 'required|unique:restaurants|min:5|max:255|string',
            'image' => 'required|image',
            'description' => 'required|min:1'
        ];
    }
}
