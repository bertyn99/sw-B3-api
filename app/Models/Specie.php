<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 * 
 * @OA\Xml(name="Planet"),
 * @OA\Property(property="id", type="integer", readOnly="true", example="1"),
 * @OA\Property(property="name", type="string", description="people name"),
 * @OA\Property(property="classification", type="string", description="People birth year"),
 * @OA\Property(property="designation", type="string", description="People eye color"),
 * @OA\Property(property="height_average", type="string", description="People hair color"),
 * @OA\Property(property="hair_colors", type="string", description="People skin color"),
 * @OA\Property(property="eye_colors", type="string", description="People height"),
 * @OA\Property(property="average_life", type="string", description="Planet climate"),
 * @OA\Property(property="language", type="string", description="Planet terrain"),
 * @OA\Property(property="skin_colors", type="string", description="Planet terrain"),
 * @OA\Property(property="url", type="string", description="People url"),
 * @OA\Property(property="created_at", type="string", format="date-time", description="Initial creation timestamp", readOnly="true"),
 * @OA\Property(property="updated_at", type="string", format="date-time", description="Last update timestamp", readOnly="true"),
 * @OA\Property(property="deleted_at", type="string", format="date-time", description="Soft delete timestamp", readOnly="true")
 * )
 *
 * Class Specie
 *
 */
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
        'average_life',
        'language',
        'skin_colors',
        'url',

    ];

    public function homeworld(){
        return $this->belongsTo(Planet::class);
    }
    public function films(){
        return $this->hasMany(Film::class);
    }

    public function people(){
        return $this->hasMany(People::class);
    }
  
}
