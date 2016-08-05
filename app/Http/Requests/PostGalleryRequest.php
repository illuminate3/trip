<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class PostGalleryRequest extends Request
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
            'title' => 'required|min:5|max:255',
            'image' => 'required|image',
            'description' => 'required|min:10'
        ];
    }
}
