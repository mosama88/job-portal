<?php

namespace App\Models;

use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Company extends Model implements HasMedia

{
    use HasFactory, InteractsWithMedia;

    protected $table = 'companies';
    protected $fillable = [
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

    //----------------------------------------------- Media
    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Fit::Contain, 300, 300)
            ->nonQueued();
    }


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('photo')->singleFile();
    }
}