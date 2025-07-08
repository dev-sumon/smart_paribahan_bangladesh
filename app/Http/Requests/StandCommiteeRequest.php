<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StandCommiteeRequest extends FormRequest
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
            'designation' => 'required|string|min:3|max:50',
            'status' => 'nullable|boolean',
            'division_id' => 'required|exists:divisions,id',
            'district_id' => 'required|exists:districts,id',
            'thana_id' => 'required|exists:thanas,id',
            'union_id' => 'required|exists:unions,id',
            'stand_id' => 'required|exists:stands,id',
            'vehicle_type_id' => 'required|exists:stands,id',
        ]
            +
            ($this->isMethod('POST') ? $this->store() : $this->update());
    }
    protected function store(): array
    {
        return [
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:stand_committees,email',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:10240',

        ];
    }
    protected function update(): array
    {
        return [
            'phone' => 'nullable|string|max:15',
            'email' => 'required|email|unique:stand_committees,email,' . $this->route('id'),
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:10240',
        ];
    }
}
