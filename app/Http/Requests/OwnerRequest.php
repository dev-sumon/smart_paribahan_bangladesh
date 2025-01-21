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
            'division_id' => 'nullable|exists:divisions,id',
            'district_id' => 'nullable|exists:districts,id',
            'thana_id' => 'nullable|exists:thanas,id',
            'union_id' => 'nullable|exists:unions,id',
            'stand_id' => 'nullable|exists:stands,id',
            'vehicle_id' => 'nullable|exists:vehicles,id',
            'email' => 'required|email|unique:owners,email',
            'phone' => 'required|string|min:11|max:11|unique:owners,phone',
            'vehicles_license' => 'required|string|min:10|max:12|unique:owners,vehicles_license',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ];
    }
    protected function update(): array
    {
        return [
            'division_id' => 'required|exists:divisions,id',
            'district_id' => 'required|exists:districts,id',
            'thana_id' => 'required|exists:thanas,id',
            'union_id' => 'required|exists:unions,id',
            'stand_id' => 'required|exists:stands,id',
            'vehicle_id' => 'required|exists:vehicles,id',
            'email' => 'required|email|unique:owners,email,' . $this->route('id'),
            'phone' => 'required|string|min:11|max:11|unique:owners,phone,' . $this->route('id'),
            'vehicles_license' => 'required|string|min:10|max:12|unique:owners,vehicles_license,' . $this->route('id'),
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'password' => 'nullable|string|min:8|confirmed',
            'password_confirmation' => 'nullable|string|min:8',
        ];
    }
}
