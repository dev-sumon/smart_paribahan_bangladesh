<?php

namespace App\Http\Requests;

use App\Models\Driver;
use Illuminate\Foundation\Http\FormRequest;

class DriverRequest extends FormRequest
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
            'title' => 'required|string|min:3|max:30',
            'status' => 'nullable|boolean',
        ]
            +
            ($this->isMethod('POST') ? $this->store() : $this->update());
    }
    protected function store(): array
    {
        return [
            'description' => 'nullable|min:55|string',
            'designation' => 'nullable|min:3|max:55',
            'email' => 'required|email|unique:drivers,email',
            'phone' => 'required|string|unique:drivers,phone',
            'driving_license' => 'nullable|string|min:13|max:13|unique:drivers,driving_license',
            'blood_group' => 'nullable|string|min:2|max:3',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ];
    }
    protected function update(): array
    {
        return [
            'description' => 'nullable|min:55|max:500|string',
            'designation' => 'nullable|min:3|max:55',
            // 'email' => 'required|email|unique:drivers,email,' . $this->route('id'),
            // 'driving_license' => 'required|string|min:13|max:13|unique:drivers,driving_license,' . $this->route('id'),
            'email' => 'required|email|unique:drivers,email,' . Driver::where('slug', $this->route('slug'))->value('id'),
            'driving_license' => 'required|string|min:13|max:13|unique:drivers,driving_license,' . Driver::where('slug', $this->route('slug'))->value('id'),
            'blood_group' => 'nullable|string|min:2|max:3',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'password' => 'nullable|string|min:8|confirmed',
            'password_confirmation' => 'nullable|string|min:8',
        ];
    }
}
