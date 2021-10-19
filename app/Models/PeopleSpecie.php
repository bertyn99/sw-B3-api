<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeopleSpecie extends Model
{
    use HasFactory;

    protected $table = "people_species";
    public function people() {
        return $this->belongsTo(People::class);
    }

    public function specie() {
        return $this->belongsTo(Specie::class);
    }
}
