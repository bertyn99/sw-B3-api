<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'pilot',
        'vehicule',

    ];
    public function peoples()
    {

        return $this->belongsToMany(Peoples::class, 'pilot');

    }
}
