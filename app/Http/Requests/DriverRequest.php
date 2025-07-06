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
            'division_id' => 'required|exists:divisions,id',
            'district_id' => 'required|exists:districts,id',
            'thana_id' => 'required|exists:thanas,id',
            'union_id' => 'required|exists:unions,id',
            'stand_id'    => 'required|exists:stands,id',
            'vehicle_id'    => 'nullable|exists:vehicles,id',
            'blood_group_id' => 'required|exists:blood_groups,id',
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
            'driving_license' => 'required|string|min:13|max:13|unique:drivers,driving_license',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ];
    }
    protected function update(): array
    {
        return [
            'description' => 'nullable|min:55|string',
            'designation' => 'nullable|min:3|max:55',
            // 'email' => 'required|email|unique:drivers,email,' . $this->route('id'),
            // 'driving_license' => 'required|string|min:13|max:13|unique:drivers,driving_license,' . $this->route('id'),
            'email' => 'required|email|unique:drivers,email,' . Driver::where('slug', $this->route('slug'))->value('id'),
            'driving_license' => 'required|string|min:13|max:13|unique:drivers,driving_license,' . Driver::where('slug', $this->route('slug'))->value('id'),
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'password' => 'nullable|string|min:8|confirmed',
            'password_confirmation' => 'nullable|string|min:8',
        ];
    }
}
