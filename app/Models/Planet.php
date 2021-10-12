<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    use HasFactory;
    protected $table = 'planets';

    protected $fillable = [
        'id',
        'name',
        'model',
        'diameter',
        'rotation_period',
        'orbital_period',
        'gravity',
        'population',
        'climate',
        'terrain',
        'surface_water',
        'url',


    ];
    public function residents()
    {

        return $this->belongsToMany(People::class, 'planets_peoples', 'people', 'planet');

    }

    public function films()
    {
        return $this->belongsToMany(Film::class);
    }
}
