<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    use HasFactory;
    protected $table = 'planets';
    protected $hidden = ['pivot'];

    protected $fillable = [
        'id',
        'name',
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

        return $this->hasMany(PeoplePlanet::class);

    }

    public function films()
    {
        return $this->hasMany(FilmPlanet::class);
    }

    public function species()
    {
        return $this->hasMany(Specie::class);
    }
}
