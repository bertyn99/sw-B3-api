<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmPlanet extends Model
{
    use HasFactory;
    protected $table = 'planets_films';

    protected $fillable = [
        'id',
        'film',
        'planet'
    ];

    public function film()
    {

        return $this->belongsTo(Film::class);

    }
    public function planet()
    {

        return $this->belongsTo(Planet::class);

    }

}
