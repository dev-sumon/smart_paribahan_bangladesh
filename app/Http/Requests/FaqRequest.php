<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'status' => 'required|boolean',
        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }
    protected function store(): array
    {
        return[
            'question' => 'required|string|min:3|max:250',
            'answer' => 'required|string|min:3|max:500',
        ];
    }
    protected function update(): array
    {
        return[
            'question' => 'nullable|string|min:3|max:250',
            'answer' => 'nullable|string|min:3|max:500',
        ];
    }
}
