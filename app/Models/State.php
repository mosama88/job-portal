<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use EloquentFilter\Filterable;

class State extends Model

{
    use HasFactory, Filterable;

    protected $table = 'states';
    protected $fillable = [
        'name',
        'country_id',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id')->withDefault('Not Define');
    }
}
