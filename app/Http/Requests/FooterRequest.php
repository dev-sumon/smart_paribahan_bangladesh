<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FooterRequest extends FormRequest
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
            'goole_play' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'app_store' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }
    protected function store(){
        return [
            'logo' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'description' => 'required|min:20|max:500',
            'phone' => 'required|string|min:11|max:11',
            'email' => 'required|email|unique:footers,email',
            
        ];
    }
    protected function update(){
        return [
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'description' => 'nullable|min:20|max:500',
            'phone' => 'nullable|string|min:11|max:11',
            'email' => 'required|email|unique:admins,email,' .$this->route('id'),
        ];
    }
}
