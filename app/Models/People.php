<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;
    protected $table = 'peoples';
    protected $hidden = ['pivot'];
    protected $fillable = [
        'id',
        'name',
        'birth_year',
        'eye_color',
        'hair_color',
        'height',
        'mass',
        'gender',
        'skin_color',
        'url'
    ];

    public function vehicles(){
        return $this->hasMany(PeopleVehicle::class);
    }
    public function film(){
        return $this->hasMany(PeopleFilm::class);
    }
    public function species(){
        return $this->hasMany(PeopleSpecie::class);
    }
    public function planet(){
        return $this->belongsTo(PeoplePlanet::class);
    }
    public function starship(){
        return $this->hasMany(FilmStarship::class);
    }

}
