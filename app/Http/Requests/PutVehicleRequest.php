<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PutVehicleRequest extends Request
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
            'name' => 'required|min:5|max:255',
            'slug' => 'required|unique:vehicles|min:5|max:255|string',
            'description' => 'required|min:10|max:255'
        ];
    }
}
