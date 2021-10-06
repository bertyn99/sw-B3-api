<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'birth_year',
        'eye_color',
        'hair_color0',
        'height',
        'mass',
        'skin_color',
        'url'
    ];

    public function homeworld(){
        return $this->belongsTo(Planet::class, 'homeworld');
    }
    public function vehicles(){
        return $this->belongsToMany(Vehicle::class, 'peoples_vehicles','pilot','vehicle');
    }
    public function film(){
        return $this->belongsToMany(Film::class, 'people_films','film','character');
    }
    public function species(){
        return $this->belongsToMany(Film::class, 'people_species','specie','people');
    }
    public function planet(){
        return $this->belongsTo(Planet::class, 'homeworld');
    }

}
