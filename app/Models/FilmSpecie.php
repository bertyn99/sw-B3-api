<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmSpecie extends Model
{
    use HasFactory;
   

    protected $table = "film_species";
    public function film() {
        return $this->belongsTo(FIlm::class);
    }

    public function specie() {
        return $this->belongsTo(Specie::class);
    }
}
