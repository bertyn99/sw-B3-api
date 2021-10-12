<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'id',
        'title',
        'episode_id',
        'opening_crawl',
        'director',
        'producer',
        'release_date',
        'url',
    ];

    public function starship()
    {
        return $this->belongsToMany(Starship::class, 'starships_films', 'starship', 'film');
    }
    
    public function people()
    {
        return $this->belongsToMany(People::class, 'people_films', 'people', 'film');
    }

    public function vehicle()
    {
        return $this->belongsToMany(Vehicle_film::class, 'vehicles_films', 'vehicle', 'film');
    }

    public function specie()
    {
        return $this->belongsToMany(Specie_film::class, 'species_films', 'specie', 'film');
    }

    public function planet()
    {
        return $this->belongsToMany(Planet_film::class, 'planets_films', 'planet', 'film');
    }
}
