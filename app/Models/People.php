<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 *
 * @OA\Schema(
 * 
 * @OA\Xml(name="People"),
 * @OA\Property(property="id", type="integer", readOnly="true", example="1"),
 * @OA\Property(property="name", type="string", description="people name"),
 * @OA\Property(property="birth_year", type="string", description="People birth year"),
 * @OA\Property(property="eye_color", type="string", description="People eye color"),
 * @OA\Property(property="hair_color", type="string", description="People hair color"),
 * @OA\Property(property="skin_color", type="string", description="People skin color"),
 * @OA\Property(property="height", type="string", description="People height"),
 * @OA\Property(property="mass", type="string", description="People mass"),
 * @OA\Property(property="gender", type="string", description="People gender"),
 * @OA\Property(property="hright", type="string", description="People url"),
 * @OA\Property(property="created_at", type="string", format="date-time", description="Initial creation timestamp", readOnly="true"),
 * @OA\Property(property="updated_at", type="string", format="date-time", description="Last update timestamp", readOnly="true"),
 * @OA\Property(property="deleted_at", type="string", format="date-time", description="Soft delete timestamp", readOnly="true")
 * )
 *
 * Class People
 *
 */
class People extends Model
{
    use HasFactory;
    protected $table = 'peoples';
    protected $hidden = ['pivot'];
    protected $fillable = [
        'id',
        'name',
        'birth_year',
        'eye_color',
        'hair_color',
        'height',
        'mass',
        'gender',
        'skin_color',
        'url'
    ];

    public function homeworld(){
        return $this->belongsTo(Planet::class, 'homeworld');
    }
    public function vehicles(){
        return $this->belongsToMany(Vehicle::class, 'peoples_vehicles','pilot','vehicle');
    }
    public function film(){
        return $this->belongsToMany(Film::class, 'people_films','film','character');
    }
    public function species(){
        return $this->belongsToMany(Specie::class, 'people_species','specie','people');
    }
    public function planet(){
        return $this->belongsTo(Planet::class, 'homeworld');
    }
    public function starship(){
        return $this->belongsToMany(Starship::class, 'people_starships','starship','people');
    }

}
