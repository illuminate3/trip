<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostPackageRequest extends Request
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
            'name' => 'required|string',
            'type' => 'required|string',
            'image' => 'required|image',
            'price' => 'required|integer',
            'description' => 'required|string|min:10',
            'duration' => 'required|integer',
            'difficulty' => 'required|string',
            'best_season' => 'required|string',
            'tour_id' => 'required|integer',
        ];
    }
}
