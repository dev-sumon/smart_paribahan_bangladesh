<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:20',
            'status' => 'required|boolean',
        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }
    protected function store(): array
    {
        return[
            'stand_id' => 'required|exists:stands,id',
            'vehicle_type_id' => 'nullable|exists:vehicle_types,id',
            'owner_id' => 'nullable|exists:owners,id',
            'driver_id' => 'nullable|exists:drivers,id',
        ];
    }
    protected function update(): array
    {
        return[
            'stand_id' => 'required|exists:stands,id',
            'vehicle_type_id' => 'nullable|exists:vehicle_types,id',
            'owner_id' => 'nullable|exists:owners,id',
            'driver_id' => 'nullable|exists:drivers,id',
        ];
    }
}
