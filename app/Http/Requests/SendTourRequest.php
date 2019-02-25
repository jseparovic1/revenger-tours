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
            'people' => 'required|min:1|max:8|integer',
            'email' => 'required|email',
            'comment' => 'nullable',
            'tour' => 'required',
        ];
    }

    public function name(): string
    {
        return $this->validated()['name'];
    }

    public function people(): int
    {
        return $this->validated()['people'];
    }

    public function email(): string
    {
        return $this->validated()['email'];
    }

    public function comment(): ?string
    {
        return $this->validated()['comment'];
    }
}
