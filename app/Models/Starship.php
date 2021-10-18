<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Starship extends Model
{
    use HasFactory;
  
    protected $table = 'starships';
    protected $hidden = ['pivot'];

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
        'starship_class',
        'url',
    ];

    public function film()
    {
        return $this->belongsToMany(Starship::class, 'starships_films', 'film', 'starship');
        //(class pointe, table pointe, colonne pointe, colonne depart)
    }

    public function filmUrl(){
        return $this->belongsToMany(Starship::class, 'starships_films', 'film', 'starship')->select('url');
    }

    public function people()
    {
        return $this->belongsToMany(People::class, 'people_starships', 'people', 'starship');
    }

    public function peopleUrl(){
        return $this->belongsToMany(People::class, 'people_starships', 'people', 'starship')->select('url');
    }
}