<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnionRequest extends FormRequest
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
            'status'=>'required|boolean',
        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }
    protected function store():array
    {
        return [
            'union' => 'required|max:20|string|min:3|unique:unions,union',
        ];
    }
    protected function update():array
    {
        return [
            'union' => 'required|max:20|string|min:3|unique:unions,union,' . $this->route('id'),
        ];
    }
}
