<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCompetitionRequest extends FormRequest
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
            'name' => 'required|unique:competitions|max:255',
            'code' => 'required',
            'description' => 'required',
            'activity_category_id' => 'required|exists:activity_categories,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:active,inactive,completed',
            'location' => 'nullable|string|max:255',
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:20',
            'created_by' => 'nullable|exists:users,id',
            'updated_by' => 'nullable|exists:users,id',
            'deleted_by' => 'nullable|exists:users,id',
            'slug' => 'nullable|string|max:255|unique:competitions,slug',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video_url' => 'nullable|url|max:255',
            'organizer_name' => 'nullable|string|max:255',
            'organizer_email' => 'nullable|email|max:255',
            'organizer_phone' => 'nullable|string|max:20',
            'organizer_website' => 'nullable|url|max:255',
            'terms_and_conditions' => 'nullable|string|max:5000',
            'prize_details' => 'nullable|string|max:5000',
            'registration_fee' => 'nullable|numeric|min:0',
            'rules' => 'nullable|string|max:5000',
            'judging_criteria' => 'nullable|string|max:5000',
            'eligibility_criteria' => 'nullable|string|max:5000',
            'feedback' => 'nullable|string|max:5000',
            'additional_info' => 'nullable|string|max:5000',
            'social_media_links' => 'nullable|array',
            'social_media_links.*' => 'nullable|url|max:255',
        ];
    }
}
