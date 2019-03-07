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
            'price' => 'required|numeric',
            'type' => 'required|in:normal,private',
            'itinerary' => 'sometimes|string',
            'departure_location' => 'nullable|string',
            'departure_time' => 'nullable|string',
            'included' => 'nullable|string',
            'excluded' => 'nullable|string',
            'featured' => 'sometimes',
            'hero_short_description' => 'nullable|string',
            'hero_description' => 'nullable|string',
            'recommended' => 'sometimes',
            'card_description' => 'nullable|string',
            'hero' => 'required',
        ];

        if ($this->input('recommended')) {
            $rules['card_description'] = 'required';
        }

        if ($this->input('featured')) {
            $rules['hero_short_description'] = 'required';
            $rules['hero_description'] = 'required';
        }

        return $rules;
    }
}
