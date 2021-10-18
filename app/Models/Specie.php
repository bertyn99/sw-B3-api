<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
    use HasFactory;
  
    protected $table='species';
    protected $hidden = ['pivot'];
    protected $fillable = [
        'id',
        'name',
        'classification',
        'designation',
        'height_average',
        'hair_colors',
        'eye_colors',
        'height',
        'average_life',
        'language',
        'skin_colors',
        'url',

    ];

    public function homeworld(){
        return $this->belongsTo(Planet::class);
    }
}
