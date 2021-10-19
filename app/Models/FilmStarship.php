<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmStarship extends Model
{
    use HasFactory;

    protected $table= 'starships_films';
    public function starship()
    {
        return $this->belongsTo(Starship::class);
    }
    public function film(){
        return $this->belongsTo(Film::class);
    }
}
