<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|max:20|string|min:3',
            'status'=>'required|boolean',
        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }
    protected function store(): array
    {
        return [
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|srting|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ];
    }
    protected function update(): array
    {
        return [
            'email' => 'required|email|unique:admins,email' . $this->route('id'),
            'password' => 'nullable|string|min:8|confirmed',
            'password_confirmation' => 'nullable|srting|min:8',
        ];
    }
}
