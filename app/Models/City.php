<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use EloquentFilter\Filterable;

class City extends Model

{
    use HasFactory, Filterable;

    protected $table = 'cities';
    protected $fillable = [
        'name',
        'state_id',
        'country_id',
    ];


    public function state()
    {
        return $this->belongsTo(State::class, 'state_id')->withDefault(['name' =>'Not Define']);
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id')->withDefault(['name' =>'Not Define']);
    }
}
