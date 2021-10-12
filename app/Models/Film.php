<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $table ='films';   
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
        return $this->belongsToMany(Starship::class, 'starships_films', 'starship', 'film');
    }
    public function starshipUrl(){
        return $this->belongsToMany(Starship::class, 'starships_films', 'starship', 'film')->select('url');
    }
    
    public function people()
    {
        return $this->belongsToMany(People::class, 'people_films', 'people', 'film');
    }

    public function peopleUrl(){
        return $this->belongsToMany(People::class, 'people_films', 'people', 'film')->select('url');
    }

    public function vehicle()
    {
        return $this->belongsToMany(Vehicle_film::class, 'vehicles_films', 'vehicle', 'film');
    }

    public function vehicleUrl(){
        return $this->belongsToMany(Vehicle::class, 'vehicles_films', 'vehicle', 'film')->select('url');
    }

    public function specie()
    {
        return $this->belongsToMany(Specie_film::class, 'species_films', 'specie', 'film');
    }

    public function specieUrl(){
        return $this->belongsToMany(Specie_film::class, 'species_films', 'specie', 'film')->select('url');
    }

    public function planet()
    {
        return $this->belongsToMany(Planet_film::class, 'planets_films', 'planet', 'film');
    }

    public function planetUrl(){
        return $this->belongsToMany(Planet_film::class, 'planets_films', 'planet', 'film')->select('url');
    }
} 
