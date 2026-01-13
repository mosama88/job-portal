<?php


use  App\Models\Company;
use Illuminate\Support\Facades\Auth;

if (!function_exists('getFirstLetter')) {
    function getFirstLetter($name)
    {
        return mb_substr($name, 0, 1);
    }


    if (!function_exists('isCompanyProfileComplete')) {
        function isCompanyProfileComplete(): bool
        {
            $requiredFildes = [
                'user_id',
                'name',
                'slug',
                'industry_type_id',
                'organization_type_id',
                'team_size_id',
                'establishemnt_date',
                'phone',
                'email',
                'website',
                'bio',
                'vision',
                'total_views',
                'address',
                'city',
                'state',
                'country',
                'map_link',
                'is_profile_verified',
                'document_verified_at',
                'profile_completion',
                'visibility'
            ];
            $companyProfile = Company::where('user_id', Auth::user()->id)->first();

            foreach ($requiredFildes as $fildes) {
                if (empty($companyProfile->{$fildes})) {
                    return false;
                }
            }
            return true;
        }
    }
}
