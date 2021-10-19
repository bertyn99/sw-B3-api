<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeopleFilm extends Model
{
    use HasFactory;
    protected $table= 'people_films';
    public function people(){
        return $this->belongsTo(People::Class);
    }
    public function film(){
        return $this->belongsTo(Film::class);
    }
}
