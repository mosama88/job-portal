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
            'industry_type_id' => ['required', 'integer'],
            'organization_type_id' => ['required', 'integer'],
            'team_size_id' => ['required', 'integer'],
            'establishemnt_date' => ['required', 'date'],
            'website' => ['required', 'active_url'],
            'email' => ['required', 'url'],
            'phone' => ['required'],
            'country' => ['required', 'integer'],
            'state' => ['required', 'integer'],
            'city' => ['required', 'integer'],
            'address' => ['required', 'string', 'max:500'],
            'map_link' => ['required'],
        ];
    }
}
