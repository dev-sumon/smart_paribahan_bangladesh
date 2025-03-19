<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'title' => 'required|string|min:3|max:250',
            'status' => 'nullable|boolean',
        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }
    protected function store(): array
    {
        return [
            'description' => 'required|string|min:50',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ];
    }
    protected function update(): array
    {
        return [
            'description' => 'nullable|string|min:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ];
    }
}
