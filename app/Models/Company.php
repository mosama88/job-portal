<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'industry_type_id',
        'organization_type_id',
        'team_size_id',
        'logo',
        'banner',
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
}