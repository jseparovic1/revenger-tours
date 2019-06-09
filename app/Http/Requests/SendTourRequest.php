<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendTourRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'dateInput' => 'required',
            'name' => 'required',
            'people' => 'required|min:1|max:10|integer',
            'email' => 'required|email',
            'comment' => 'nullable',
            'tour' => 'required',
        ];
    }
}
