<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use EloquentFilter\Filterable;

class Currency extends Model

{
    use HasFactory, Filterable;

    protected $table = 'currencies';
    protected $fillable = [
        'name',
        'code',
    ];

}
