<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle_Film extends Model
{
    use HasFactory;
    protected $fillable = [
        'vehicle',
        'film'
    ];

    public function vehicle(){
        return $this->belongsTo(Vehicle::class,'vehicles','id','vehicle');
        //(classe pointe, table pointe, colonne pointe, colonne départ)
    }

    public function film(){
        return $this->belongsTo(Film::class,'films','id','film');
    }
}
