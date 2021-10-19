<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;


    protected $table ='films';   
    protected $hidden = ['pivot'];
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
        return $this->hasMany(FilmStarship::class);
    }
    public function starshipUrl(){
        return $this->hasMany(FilmStarship::class)->select('url');
    }
    
    public function people()
    {
        return $this->hasMany(PeopleFilm::class);
    }

    public function peopleUrl(){
        return $this->hasMany(PeopleFilm::class)->select('url');
    }

    public function vehicle()
    {
        return $this->hasMany(FilmVehicle::class);
    }

    public function vehicleUrl(){
        return $this->hasMany(FilmVehicle::class)->select('url');
    }

    public function specie()
    {
        return $this->hasMany(FilmSpecie::class);
    }

    public function specieUrl(){
        return $this->hasMany(FilmSpecie::class)->select('url');
    }

    public function planet()
    {
        return $this->belongsToMany(FilmPlanet::class, 'planets_films', 'planet', 'film');
    }

    public function planetUrl(){
        return $this->hasMany(FIlmPlanet::class, 'planets_films', 'planet', 'film')->select('url');
    }
} 
