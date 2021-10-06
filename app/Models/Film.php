<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    
    protected $fillable = [
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
        return $this->belongsToMany(Starship_film::class, 'starships_films', 'film', 'id');
    }
    
    public function people()
    {
        return $this->belongsToMany(People_film::class, 'people_films', 'film', 'id');
    }

    public function vehicle()
    {
        return $this->belongsToMany(Vehicle_film::class, 'vehicles_films', 'film', 'id');
    }

    public function specie()
    {
        return $this->belongsToMany(Specie_film::class, 'species_films', 'film', 'id');
    }

    public function planet()
    {
        return $this->belongsToMany(Planet_film::class, 'planets_films', 'film', 'id');
    }
}
