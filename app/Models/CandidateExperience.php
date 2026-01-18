<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CandidateExperience extends Model

{
    use HasFactory;

    protected $table = 'candidate_experiences';
    protected $fillable = [
        'candidate_id',
        'company',
        'department',
        'designation',
        'start',
        'end',
        'responsibilities',
        'currently_working'
    ];

    protected $casts = ['start' => 'date', 'end' => 'date'];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'candidate_id')->withDefault(['name' => 'Not Define']);
    }
}
