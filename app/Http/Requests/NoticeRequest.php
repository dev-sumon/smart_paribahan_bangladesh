<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticeRequest extends FormRequest
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
            'title' => 'required|string|min:20|max:250',
            'status' => 'required|boolean',
            'date' => 'required|string|min:4|max:9',
            'category' => 'required|string|min:3|max:50',
            'file' => 'required|mimes:pdf',

        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }
    protected function store(): array
    {
        return [
            
        ];
    }
    protected function update(): array
    {
        return [

        ];
    }
}
