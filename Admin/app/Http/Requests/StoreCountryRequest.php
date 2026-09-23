<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCountryRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:countries|max:255',
            'code' => 'required|size:2',
            'continent' => 'nullable|string|max:500',
            'status' => 'required|in:active,inactive',
            'capital' => 'nullable|string|max:255',
            'currency' => 'nullable|string|max:50',
            'phone_code' => 'nullable|string|max:10',
            'flag' => 'nullable|image|max:2048', // Assuming flag is an
            'language' => 'nullable|string|max:100',
            'timezone' => 'nullable|string|max:100',
            'created_by' => 'nullable|exists:users,id',
            'updated_by' => 'nullable|exists:users,id',
            'deleted_at' => 'nullable|date',
            'created_at' => 'nullable|date',
            'updated_at' => 'nullable|date',
            'deleted_by' => 'nullable|exists:users,id',
        ];
    }
}
