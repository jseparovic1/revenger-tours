<?php

namespace App\Http\Requests;

use App\Tour;
use Illuminate\Foundation\Http\FormRequest;

class ShowTourRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'trip_date' => 'sometimes|required|date',
            'people' => 'sometimes|required|min:1|max:8',
            'tour' => 'sometimes|required'
        ];
    }

    public function tripDate()
    {
        return $this->validated()['trip_date'];
    }

    public function people()
    {
        return $this->validated()['people'];
    }

    public function tourId(): string
    {
        return $this->validated()['tour'];
    }
}
