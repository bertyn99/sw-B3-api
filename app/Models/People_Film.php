<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People_Film extends Model
{
    use HasFactory;
    protected $fillable = [
        'people',
        'film'
    ];

    public function people(){
        return $this->belongsTo(People::class,'peoples','id','people');
        //(classe pointe, table pointe, colonne pointe, colonne départ)
    }

    public function film(){
        return $this->belongsTo(Film::class,'films','id','film');
    }
    
}
