<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use EloquentFilter\Filterable;

class CandidateSkill extends Model

{
    use HasFactory, Sluggable, Filterable;

    protected $table = 'candidate_skills';
    protected $fillable = [
        'candidate_id',
        'skill_id',
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
