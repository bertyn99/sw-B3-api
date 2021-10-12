<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
    use HasFactory;
    use HasFactory;

    protected $fillable = [
        'id',
        'film',
        'people',
        'name',
        'birth_year',
        'eye_color',
        'gender',
        'hair_color',
        'height',
        'mass',
        'skin_color',
    ];

    public function homeworld(){
        return $this->belongsTo(Planet::class);
    }
}
