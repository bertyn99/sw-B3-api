<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeopleVehicle extends Model
{
    use HasFactory;
    protected $table = 'peoples_vehicles';

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
    public function people()
    {
        return $this->belongsTo(People::class,'pilot');
    }

}
