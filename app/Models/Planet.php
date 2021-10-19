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
 * @OA\Property(property="diameter", type="string", description="People birth year"),
 * @OA\Property(property="rotation_period", type="string", description="People eye color"),
 * @OA\Property(property="orbital_period", type="string", description="People hair color"),
 * @OA\Property(property="gravity", type="string", description="People skin color"),
 * @OA\Property(property="population", type="string", description="People height"),
 * @OA\Property(property="climate", type="string", description="Planet climate"),
 * @OA\Property(property="terrain", type="string", description="Planet terrain"),
 * @OA\Property(property="surface_water", type="string", description="Planet terrain"),
 * @OA\Property(property="url", type="string", description="People url"),
 * @OA\Property(property="created_at", type="string", format="date-time", description="Initial creation timestamp", readOnly="true"),
 * @OA\Property(property="updated_at", type="string", format="date-time", description="Last update timestamp", readOnly="true"),
 * @OA\Property(property="deleted_at", type="string", format="date-time", description="Soft delete timestamp", readOnly="true")
 * )
 *
 * Class Planet
 *
 */
class Planet extends Model
{
    use HasFactory;
    protected $table = 'planets';
    protected $hidden = ['pivot'];

    protected $fillable = [
        'id',
        'name',
        'diameter',
        'rotation_period',
        'orbital_period',
        'gravity',
        'population',
        'climate',
        'terrain',
        'surface_water',
        'url',


    ];
    public function residents()
    {
        return $this->hasMany(People::class,'homeworld');

    }

    public function films()
    {
        return $this->hasMany(FilmPlanet::class);
    }

    public function species()
    {
        return $this->hasMany(Specie::class);
    }
}
