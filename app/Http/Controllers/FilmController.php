<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\FilmSpecie;
use App\Models\FilmStarship;
use App\Models\FilmVehicle;
use App\Models\PeopleFilm;
use App\Models\FilmPlanet;

class FilmController extends Controller
{
   /**
   * @OA\Get(
   *      path="/v1/film",
   *      operationId="getAllFilm",
   *      tags={"Film"},

   *      summary="Get List Of Film",
   *      description="Returns all film and associated people, vehicle, specie, planet, starship",
   *      @OA\Response(
   *          response=200,
   *          description="Successful operation",
   *          @OA\MediaType(
   *           mediaType="application/json",
   *      )
   *      ),
   *     security={{"apiAuth":{}}},
   *      @OA\Response(
   *          response=401,
   *          description="Unauthenticated",
   *      ),
   *      @OA\Response(
   *          response=403,
   *          description="Forbidden"
   *      ),
   * @OA\Response(
   *      response=400,
   *      description="Bad Request"
   *   ),
   * @OA\Response(
   *      response=404,
   *      description="not found"
   *   ),
   *  )
   */
    public function index() {
    //liste de tous les élements
    $films = Film::all();
    foreach ($films as $film) {
       $film_id = $film->id;
       // Peoples
       $peoples = PeopleFilm::with('film')->where('film_id', $film_id)->get();
       $peopleArray = [];
       foreach ($peoples as $people) {
          $peopleArray[] = $people->film->url;
       }
       $film['characters'] = $peopleArray;

       // Planets
       $planets = FilmPlanet::with('planet')->where('film_id', $film->id)->get();
       $planetsArray = [];
       foreach ($planets as $planet) {
          $planetsArray[] = $planet->planet->url;
       }
       $film['planets'] = $planetsArray;

       // Starships
       $starships = FilmStarship::with('starship')->where('film_id', $film->id)->get();
       $starshipsArray = [];
       foreach ($starships as $starship) {
          $starshipsArray[] =$starship->starship->url;
       }
       $film['starships'] = $starshipsArray;

       // Vehicles
       $vehicles = FilmVehicle::with('vehicle')->where('film_id', $film->id)->get();
       $vehiclesArray = [];
       foreach ($vehicles as $vehicle) {
          $vehiclesArray[] =$vehicle->vehicle->url;
       }
       $film['vehicles'] = $vehiclesArray;

       //Species
       $species = FilmSpecie::with('specie')->where('film_id', $film->id)->get();
       $speciesArray = [];
       foreach ($species as $specie) {
          $speciesArray[] =$specie->specie->url;
       }
       $film['species'] = $speciesArray;
    }

    return response()->json($films);
   }

    /**
   * @OA\Get(
   *      path="/v1/film/{id}",
   *      operationId="getAFilm",
   *      tags={"Film"},

   *      summary="Get a film",
   *      description="Returns a film and associated people, vehicle, specie, planet, starship",
   *      @OA\Parameter(
   *        name="film",
   *        in="path",
   *        required=true,
   *        @OA\Schema(
   *           type="string"
   *           )
   *        ),
   *        security={{"apiAuth":{}}},
   * @OA\Response(
   *          response=200,
   *          description="Successful operation",
   *          @OA\MediaType(
   *           mediaType="application/json",
   *        )
   *      ),
   *      @OA\Response(
   *          response=401,
   *          description="Unauthenticated",
   *      ),
   *      @OA\Response(
   *          response=403,
   *          description="Forbidden"
   *      ),
   * @OA\Response(
   *      response=400,
   *      description="Bad Request"
   *   ),
   * @OA\Response(
   *      response=404,
   *      description="not found"
   *   ),
   *  )
   */
   public function show($id) {
      
		$film = Film::find($id);

		// Peoples
		$peoples = PeopleFilm::with('people')->where('film_id', $id)->get();
		$peopleArray = [];
		foreach ($peoples as $people) {
			$peopleArray[] = $people->people->url;
		}
		$film['characters'] = $peopleArray;

		// Planets
		$planets = FilmPlanet::where('film_id', $film->id)->get();
		$planetsArray = [];
		foreach ($planets as $planet) {
			$planetsArray[] = $planet->planet->url;
		}
		$film['planets'] = $planetsArray;

		// Starships
		$starships = FilmStarship::where('film_id', $film->id)->get();
		$starshipsArray = [];
		foreach ($starships as $starship) {
			$starshipsArray[] =$starship->starship->url;
		}
		$film['starships'] = $starshipsArray;

		// Vehicles
		$vehicles = FilmVehicle::where('film_id', $film->id)->get();
		$vehiclesArray = [];
		foreach ($vehicles as $vehicle) {
			$vehiclesArray[] = $vehicle->vehicle->url;
		}
		$film['vehicles'] = $vehiclesArray;

		// Species
		$species = FilmSpecie::where('film_id', $film->id)->get();
		$speciesArray = [];
		foreach ($species as $specie) {
			$speciesArray[] = $specie->specie->url;
		}
		$film['species'] = $speciesArray;

		return response()->json($film);
   }
 
  
}
