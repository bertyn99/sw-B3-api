<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'film',
        'people',

    ];
    public function residents()
    {

        return $this->hasMany(People::class);

    }

    public function films()
    {
        return $this->belongsToMany(Film::class);
    }
}
