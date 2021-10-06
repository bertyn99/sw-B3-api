<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Starship_film extends Model
{
    use HasFactory;

    protected $fillable = [
        'starship',
        'film',
    ];

    public function starships()
    {
        return $this->belongsTo(Starship::class, 'starships');
    }
    
    public function films()
    {
        return $this->belongsTo(Film::class, 'films');
    }
}
