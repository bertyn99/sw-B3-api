<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $table = 'vehicles';

    protected $fillable = [
        'id',
        'name',
        'model',
        'vehicle_class',
        'manufactor',
        'lenght',
        'cost_in_credi',
        'crew',
        'passenger',
        'max_atmosphere',
        'cargo_capacity',
        'consumables',
        'url',


    ];
    public function peoples()
    {

        return $this->belongsToMany(Peoples::class, 'peoples_vehicles', 'pilot', 'vehicle');

    }
}
