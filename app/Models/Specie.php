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

    ];
}
