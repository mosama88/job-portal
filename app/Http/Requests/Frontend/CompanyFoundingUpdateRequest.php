<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class CompanyFoundingUpdateRequest extends FormRequest
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
            'industry_type_id' => ['integer'],
            'organization_type_id' => ['integer'],
            'team_size_id' => ['integer'],
            'establishemnt_date' => ['required', 'date'],
            'website' => ['required', 'active_url'],
            'email' => ['required', 'email'],
            'phone' => ['required'],
            'country' => ['integer'],
            'state' => ['integer'],
            'city' => ['integer'],
            'address' => ['required', 'string', 'max:500'],
            'map_link' => ['required'],
        ];
    }
}
