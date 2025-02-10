<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BloodGroupRequest extends FormRequest
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
            'status'=>'required|boolean',
        ]
        +
        ($this->isMethod('POST') ?  $this->store(): $this->update());
    }
    protected function store(): array
    {
        return [
            'blood_group'=>'required|max:3|string|min:2|unique:blood_groups,blood_group',
        ];
    }
    protected function update(): array
    {
        return [
            'blood_group'=>'required|max:3|string|min:2|unique:blood_groups,blood_group,' . $this->route('id'),
        ];
    }
}
