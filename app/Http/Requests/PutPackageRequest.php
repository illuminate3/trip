<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;
class PutPackageRequest extends Request
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
            'name' => 'required',
            'type' => 'required',
            'price' => 'required|integer',
            'description' => 'required',
            'duration' => 'required',
            'difficulty' => 'required',
            'best_season' => 'required',
        ];
    }
}
