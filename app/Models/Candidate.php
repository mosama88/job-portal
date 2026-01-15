<?php

namespace App\Models;

use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Cviebrock\EloquentSluggable\Sluggable;

class Candidate extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, Sluggable;

    protected $table = 'candidates';
    protected $fillable = [
        'user_id',
        'experience_id',
        'profession_id',
        'title',
        'full_name',
        'slug',
        'gender',
        'website',
        'phone_one',
        'phone_two',
        'marital_status',
        'birth_date',
        'address',
        'email',
        'cv',
        'bio',
        'city',
        'state',
        'country',
        'status',
        'profile_completion',
        'visibility'
    ];

    protected $casts = ['birth_date' => 'date'];

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

    public function state()
    {
        return $this->belongsTo(State::class, 'state')->withDefault(['name' => 'Not Define']);
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country')->withDefault(['name' => 'Not Define']);
    }
    public function city()
    {
        return $this->belongsTo(City::class, 'city')->withDefault(['name' => 'Not Define']);
    }
    public function profession()
    {
        return $this->belongsTo(Profession::class, 'profession_id')->withDefault(['name' => 'Not Define']);
    }
}
