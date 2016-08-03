<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostRoomRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:5|max:255',
            'image' => 'required|image',
            'type' => 'required|string|min:1',
            'price' => 'required|integer',
            'description' => 'required|string|min:10|max:500',
            'number_of_rooms' => 'required|integer',
            'available_rooms' => 'required|integer',
        ];
    }
}
