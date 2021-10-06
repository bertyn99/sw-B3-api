<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People_starship extends Model
{
    use HasFactory;
    protected $fillable = [
        'people',
        'starship',
    ];

    public function starships()
    {
        return $this->belongsTo(Starship::class, 'starships');
    }
    
    public function people()
    {
        return $this->belongsTo(People::class, 'people');
    }
}
