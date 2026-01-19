<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CandidateEducation extends Model

{
    use HasFactory;

    protected $table = 'candidate_education';
    protected $fillable = [
        'candidate_id',
        'level',
        'degree',
        'year',
        'note',
    ];


    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'candidate_id')->withDefault(['name' => 'Not Define']);
    }
}
