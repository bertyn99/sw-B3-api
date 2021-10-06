<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'pilot',
        'vehicule',

    ];
    public function peoples()
    {

        return $this->belongsToMany(Peoples::class, 'peoples_vehicles', 'pilot', 'vehicle');

    }
}
