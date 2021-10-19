<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $table = 'vehicles';
    protected $hidden = ['pivot'];
    protected $fillable = [
        'id',
        'name',
        'model',
        'vehicle_class',
        'manufactor',
        'lenght',
        'cost_in_credits',
        'crew',
        'passenger',
        'max_atmosphere',
        'cargo_capacity',
        'consumables',
        'url',


    ];
    public function people()
    {

        return $this->hasMany(PeopleVehicle::class);

    }

    public function film()
    {

        return $this->hasMany(FilmVehicle::class);

    }
}

