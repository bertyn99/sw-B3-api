<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Starship extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'model',
        'manufacturer',
        'cost_in_credits',
        'length',
        'crew',
        'passengers',
        'max_atmosphering_speed',
        'hyperdrive_rating',
        'MGLT',
        'cargo_capacity',
        'consumables',
        'url',
    ];

    public function film()
    {
        return $this->belongsToMany(Starship_film::class, 'starships_films', 'starship', 'id');
        //(class pointe, table pointe, colonne pointe, colonne depart)
    }

    public function people()
    {
        return $this->belongsToMany(People_starship::class, 'people_starships', 'starship', 'id');
    }
}
