<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeopleStarship extends Model
{
    use HasFactory;

    protected $table= 'people_starships';
    public function people(){
        return $this->belongsTo(People::Class,'people_id');
    }
    public function starship()
    {
        return $this->belongsTo(Starship::class,'starship_id');
    }
}
