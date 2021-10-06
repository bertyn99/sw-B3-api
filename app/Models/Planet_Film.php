<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planet_Film extends Model
{
    use HasFactory;
    protected $fillable = [
        'planet',
        'film'
    ];

    public function planet(){
        return $this->belongsTo(Planet::class,'planets','id','planet');
        //(classe pointe, table pointe, colonne pointe, colonne départ)
    }

    public function film(){
        return $this->belongsTo(Film::class,'films','id','film');
    }
}
