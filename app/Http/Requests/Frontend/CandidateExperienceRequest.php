<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class CandidateExperienceRequest extends FormRequest
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
            'candidate_id' => ['required', 'exists:candidates,id'],
            'company' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string', 'max:255'],
            'start' => ['required', 'date'],
            'end' => ['nullable', 'date'],
            'responsibilities' => ['required', 'string', 'min:100'],
            'currently_working' => ['nullable', 'boolean'],
        ];
    }
}
