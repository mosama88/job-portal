<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CandidateLanguage extends Model

{
    use HasFactory;

    protected $table = 'candidate_languages';
    protected $fillable = [
        'candidate_id',
        'language_id',
    ];


}
