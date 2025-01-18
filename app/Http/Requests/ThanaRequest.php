<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThanaRequest extends FormRequest
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
            'status'=>'required|boolean',
        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }
    protected function store(): array
    {
        return [
            'thana' => 'required|max:20|string|min:3|unique:thanas,thana',
        ];
    }
    protected function update(): array
    {
        return [
            'thana' => 'required|max:20|string|min:3|unique:thanas,thana,' . $this->route('id'),
        ];
    }
}
