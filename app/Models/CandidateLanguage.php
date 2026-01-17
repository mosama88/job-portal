<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use EloquentFilter\Filterable;

class CandidateLanguage extends Model

{
    use HasFactory, Sluggable, Filterable;

    protected $table = 'candidate_languages';
    protected $fillable = [
        'candidate_id',
        'language_id',
    ];


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
}
