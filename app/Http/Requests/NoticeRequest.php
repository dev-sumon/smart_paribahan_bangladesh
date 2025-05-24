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
            'notice_category_id' => 'nullable|exists:notice_categories,id',
            'file' => 'required|mimes:pdf',
        ];
    }
    protected function update(): array
    {
        return [
            'division_id' => 'nullable|exists:divisions,id',
            'district_id' => 'nullable|exists:districts,id',
            'thana_id' => 'nullable|exists:thanas,id',
            'union_id' => 'nullable|exists:unions,id',
            'stand_id' => 'nullable|exists:stands,id',
            'notice_category_id' => 'nullable|exists:notice_categories,id',
            'file' => 'nullable|mimes:pdf',
        ];
    }
}
