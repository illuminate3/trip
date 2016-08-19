<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class PostVehicleDescription extends Request
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
            'type' => 'required|string',
            'price' => 'required|integer',
            'doors' => 'required|integer',
            'max_people' => 'required|integer',
            'manufacturer' => 'required|string',
            'mileage' => 'required|integer',
            'description' => 'required|string',
            'air_conditioned' => 'required|integer'
        ];
    }
}
