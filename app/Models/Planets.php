<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planets extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'film',
        'people',

    ];
    public function peoples()
    {
        return $this->belongsToMany(Films::class);

        return $this->belongsToMany(Films::class, 'pilot');

        return $this->belongsToMany(Peoples::class);

        return $this->belongsToMany(Peoples::class, 'people');

    }
}
