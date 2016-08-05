<?php

namespace App\Http\Requests;
use Auth;
class PutRestaurantRequest extends Request
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
            'name' => 'required|min:5|max:255',
            'slug' => 'required|unique:restaurants|min:5|max:255|string',
            'description' => 'required|min:10|max:255'
        ];
    }
}
