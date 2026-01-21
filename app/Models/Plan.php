<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends Model

{
    use HasFactory;

    protected $table = 'plans';
    protected $fillable = [
        'label',
        'price',
        'job_limit',
        'featured_job_limit',
        'highlight_job_limit',
        'profile_verified',
        'recommended',
        'frontend_show'
    ];
}
