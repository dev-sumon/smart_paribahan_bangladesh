<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OwnerRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:50',
            'description' => 'required|string|min:20|max:500',
            'status' => 'required|boolean|'
        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }
    protected function store(): array
    {
        return [
            'email' => 'required|email|unique:owners,email',
            'phone' => 'required|string|min:11|max:11|unique:owners,phone',
            'license_number' => 'required|string|min:10|max:12',
            'blood_group' => 'nullable|string|min:2|max:3',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ];
    }
    protected function update(): array
    {
        return [
            'email' => 'required|email|unique:owners,email,' . $this->route('id'),
            'phone' => 'required|string|min:11|max:11|unique:owners,phone,' . $this->route('id'),
            'license_number' => 'required|string|min:10|max:12',
            'blood_group' => 'nullable|string|min:2|max:3',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'password' => 'nullable|string|min:8|confirmed',
            'password_confirmation' => 'nullable|string|min:8',
        ];
    }
}
