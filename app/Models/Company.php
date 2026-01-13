<?php

namespace App\Models;

use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Cviebrock\EloquentSluggable\Sluggable;

class Company extends Model implements HasMedia

{
    use HasFactory, InteractsWithMedia, Sluggable;

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

    protected $casts = ['establishemnt_date' => 'date'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

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