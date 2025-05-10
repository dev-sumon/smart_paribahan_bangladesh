<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FieldWorkRequest extends FormRequest
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
            'name'=>'required|max:20|string|min:3',
            
        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }
    protected function store(): array
    {
        return [
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:field_workers,email',
            'nid' => 'required|string|min:10|max:13',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg',
            'father_name' => 'required|max:20|string|min:3',
            'mother_name' => 'required|max:20|string|min:3',
            'address' => 'required|string|max:255',
            'status'=>'required|boolean',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ];
    }
    protected function update(): array
    {
        return [
            'phone' => 'nullable|string|max:15',
            'email' => 'required|email|unique:field_workers,email,' .$this->route('id'),
            'nid' => 'nullable|string|min:10|max:13',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg',
            'father_name' => 'nullable|max:20|string|min:3',
            'mother_name' => 'nullable|max:20|string|min:3',
            'address' => 'nullable|string|max:255',
            'status'=>'nullable|boolean',
            'password' => 'nullable|string|min:8|confirmed',
            'password_confirmation' => 'nullable|string|min:8',
        ];
    }
}
