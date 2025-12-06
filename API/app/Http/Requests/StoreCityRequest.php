<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCityRequest extends FormRequest
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
            'name' => 'required|unique:cities|max:255',
            'code' => 'required',
            'description' => 'nullable|string|max:500',
            'state_id' => 'required|exists:states,id',
            'country_id' => 'required|exists:countries,id',
            'status' => 'required|in:active,inactive',
            'created_by' => 'nullable|exists:users,id',
            'updated_by' => 'nullable|exists:users,id',
            'deleted_at' => 'nullable|date',
            'created_at' => 'nullable|date',
            'updated_at' => 'nullable|date',
            'deleted_by' => 'nullable|exists:users,id',
            'slug' => 'nullable|string|max:255|unique:cities,slug',
        ];
    }
}
