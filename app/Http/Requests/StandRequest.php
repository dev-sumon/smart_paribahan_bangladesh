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
            'division_id' => 'nullable|exists:divisions,id',
            'district_id' => 'nullable|exists:districts,id',
            'thana_id' => 'nullable|exists:thanas,id',
            'union_id' => 'nullable|exists:unions,id',
            'title' => 'required|string|min:3|max:50',
            'status' => 'required|boolean',
            'location' => 'required|url',
        ]
            +
            ($this->isMethod('POST') ? $this->store() : $this->update());
    }
    protected function store(): array
    {
        return [
            'description' => 'required|string|min:20|max:500',
            'image' => 'required|array',
            'image.*' => 'image|mimes:jpeg,png,jpg,svg',
            'slug' => 'required|string|unique:stands,slug',
        ];
    }
    protected function update(): array
    {
        return [
            'description' => 'nullable|string|min:20|max:500',
            'image' => 'nullable|array',
            'image.*' => 'image|mimes:jpeg,png,jpg,svg',
            'slug' => 'required|string|unique:stands,slug,' . $this->route('slug'),
        ];
    }
}
