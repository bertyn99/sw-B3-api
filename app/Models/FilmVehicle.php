<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmVehicle extends Model
{
    use HasFactory;
    protected $table = 'vehicles_films';
    protected $fillable = [
        'id',
        'vehicle',
        'film', 
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function film()
    {
        return $this->belongsTo(Film::class);
    }
}
