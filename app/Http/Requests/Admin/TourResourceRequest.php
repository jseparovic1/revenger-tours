<?php

declare(strict_types=1);

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TourResourceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'title' => 'required',
            'details' => 'required',
            'price' => 'required',
            'type' => 'sometimes|in:normal,private',
            'itinerary.*' => 'sometimes|required',
            'departure_location' => 'sometimes|required',
            'departure_time' => 'sometimes|required',
            'included' => 'sometimes|required',
            'excluded' => 'sometimes|required',
        ];

        if ($this->input('recommended')) {
            $rules[] = [
                'card_description' => 'required',
            ];
        }

        if ($this->input('featured')) {
            $rules[] = [
                'hero_short_description' => 'required',
                'hero_description' => 'required',
            ];
        }

        return $rules;
    }
}
