<?php

namespace App\Http\Requests;

use App\Models\StandManager;
use Illuminate\Foundation\Http\FormRequest;

class StandManagerRequest extends FormRequest
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
            'title' => 'required|string|min:3|max:50',
            'division_id' => 'required|exists:divisions,id',
            'district_id' => 'required|exists:districts,id',
            'thana_id' => 'required|exists:thanas,id',
            'union_id' => 'required|exists:unions,id',
            'blood_group_id' => 'required|exists:blood_groups,id',
            'stand_id' => 'required|exists:stands,id',
            'status' => 'required|boolean',
        ]
            +
            ($this->isMethod('POST') ? $this->store() : $this->update());
    }
    protected function store(): array
    {
        return [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'email' => 'required|email|unique:owners,email',
            'phone' => 'required|string|min:11|max:11|unique:owners,phone',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ];
    }
    protected function update(): array
    {
        return [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'email' => 'required|email|unique:owners,email,' . StandManager::where('slug', $this->route('slug'))->value('id'),
            'phone' => 'required|string|min:11|max:11',
            'password' => 'nullable|string|min:8|confirmed',
            'password_confirmation' => 'nullable|string|min:8',
        ];
    }
}
