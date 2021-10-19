<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeopleFilm extends Model
{
    use HasFactory;
    protected $table= 'people_films';
    public function people(){
        return $this->belongsTo(People::class,'people_id');
    }
    public function film(){
        return $this->belongsTo(Film::class,'film_id');
    }

    public function peopleUrl(){
        return $this->belongsTo(PeopleFilm::class,'people_id');
    }
}
