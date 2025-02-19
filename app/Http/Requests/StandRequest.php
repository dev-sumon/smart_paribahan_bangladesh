<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StandRequest extends FormRequest
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
            'division_id' => 'required|exists:divisions,id',
            'district_id' => 'required|exists:districts,id',
            'thana_id' => 'required|exists:thanas,id',
            'union_id' => 'required|exists:unions,id',
            'name' => 'required|string|min:3|max:50',
            'status' => 'required|boolean',
        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }
    protected function store(): array
    {
        return [
            'description' => 'required|string|min:20|max:500',
            'location' => 'required|string|min:3|max:250',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ];
    }
    protected function update(): array
    {
        return [
            'description' => 'nullable|string|min:20|max:500',
            'location' => 'nullable|string|min:3|max:250',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ];
    }
}
