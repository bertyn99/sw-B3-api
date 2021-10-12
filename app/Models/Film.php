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
        return $this->belongsToMany(Vehicle::class, 'vehicles', 'vehicle', 'film');
    }

    public function vehicleUrl(){
        return $this->belongsToMany(Vehicle::class, 'vehicles', 'vehicle', 'film')->select('url');
    }

    public function specie()
    {
        return $this->belongsToMany(Specie::class, 'species', 'specie', 'film');
    }

    public function specieUrl(){
        return $this->belongsToMany(Specie::class, 'species', 'specie', 'film')->select('url');
    }

    public function planet()
    {
        return $this->belongsToMany(Planet::class, 'planets', 'planet', 'film');
    }

    public function planetUrl(){
        return $this->belongsToMany(Planet::class, 'planets', 'planet', 'film')->select('url');
    }
} 
