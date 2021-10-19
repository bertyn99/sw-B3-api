<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmSpecie extends Model
{
    use HasFactory;
   

    protected $table = "species_films";
    public function film() {
        return $this->belongsTo(Film::class);
    }

    public function specie() {
        return $this->belongsTo(Specie::class);
    }
}
