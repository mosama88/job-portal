<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CandidateSkill extends Model

{
    use HasFactory;

    protected $table = 'candidate_skills';
    protected $fillable = [
        'candidate_id',
        'skill_id',
    ];

}
