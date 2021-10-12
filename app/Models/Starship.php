<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Starship extends Model
{
    use HasFactory;
    protected $table = 'starships';

    protected $fillable = [
        'id',
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
        return $this->belongsToMany(Starship::class, 'starships_films', 'film', 'starship');
        //(class pointe, table pointe, colonne pointe, colonne depart)
    }

    public function people()
    {
        return $this->belongsToMany(People::class, 'people_starships', 'people', 'starship');
    }
}
