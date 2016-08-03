<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostReviewRequest extends Request
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
            'review' => 'required|string|min:5|max:255',
            'rating' => 'required|integer|min:0|max:5',
            'review_model' => 'required|string',
            'review_id' => 'required|integer',
            /*'user_id' => 'required|integer',*/
        ];
    }
}
