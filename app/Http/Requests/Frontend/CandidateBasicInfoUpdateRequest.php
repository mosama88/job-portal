<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class CandidateBasicInfoUpdateRequest extends FormRequest
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
            'logo' => ['image', 'max:1500'],
            'cv' => ['max:2048', 'mimes:pdf,docx'],
            'name' => ['required', 'string', 'max:100'],
            'title' => ['required', 'string', 'max:100'],
            'experience_id' => ['required', 'string', 'max:2000'],
            'website' => ['required', 'active_url'],
            'birth_date' => ['required', 'date'],
        ];
    }
}