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
    public function peoples()
    {

        return $this->belongsToMany(People::class);

    }

    public function films()
    {
        return $this->belongsToMany(Film::class);
    }
}
