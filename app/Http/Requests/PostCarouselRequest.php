<?php

namespace App\Http\Requests;

use Auth;
use App\Http\Requests\Request;
class PostCarouselRequest extends Request
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
          'title' => 'required|min:5',
          'description' => 'required|min:5',
          'image' => 'required|mimes:jpeg,bmp,png',
          'position' => 'required|integer',
          'status' => 'required|bool'
        ];
    }
}
