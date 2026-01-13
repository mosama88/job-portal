<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use EloquentFilter\Filterable;

class Country extends Model

{
    use HasFactory, Filterable;

    protected $table = 'countries';
    protected $fillable = [
        'name',
    ];

}