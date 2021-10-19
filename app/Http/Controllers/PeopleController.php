<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;
use App\Models\PeopleFilm;

use App\Models\PeopleSpecie;
use App\Models\PeopleStarship;
use App\Models\PeopleVehicle;

class PeopleController extends Controller
{
  /**
   * @OA\Get(
   *      path="/v1/people",
   *      operationId="getAllPeople",
   *      tags={"People"},

   *      summary="Get List Of People",
   *      description="Returns all people and associated vehicle, specie.",
   *      security={{"apiAuth":{}}},
   *      @OA\Response(
   *          response=200,
   *          description="Successful operation",
   *          @OA\MediaType(
   *           mediaType="application/json",
   *      )
   *      ),
   * 
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
  public function index()
  {
    //liste de tous les élements
    $peoples = People::all();

		foreach ($peoples as $people) {
	
			// Films
			$films = PeopleFilm::where('people_id', $people->id)->get();
			$filmsArray = [];
			foreach ($films as $film) {
				$filmsArray[] = $film->film->url;
			}
			$people['films'] = $filmsArray;

			// Species
			$species = PeopleSpecie::where('people_id', $people->id)->get();
			$speciesArray = [];
			foreach ($species as $specie) {
				$speciesArray[] =$specie->specie->url;
			}
			$people['species'] = $speciesArray;

			// Vehicles
			$vehicles = PeopleVehicle::where('pilot', $people->id)->get();
			$vehiclesArray = [];
			foreach ($vehicles as $vehicle) {
				$vehiclesArray[] =$vehicle->vehicle->url;
			}
			$people['vehicles'] = $vehiclesArray;

			// Starships
			$starships = PeopleStarship::where('people_id', $people->id)->get();
			$starshipsArray = [];
			foreach ($starships as $starship) {
				$starshipsArray[] = $starship->starship->url;
			}
			$people['starships'] = $starshipsArray;
		}
    return response()->json($peoples);
  }

  public function store(Request $request)
  {
    echo 'store';
  }

  /**
   * @OA\Get(
   *      path="/v1/people/{id}",
   *      operationId="getAPerson",
   *      tags={"People"},

   *      summary="Get a person",
   *      description="Returns a person and associated vehicle, specie.",
   *      @OA\Parameter(
   *        name="people",
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
  public function show($id)
  {
    $people = People::with('homeworld')->where('id',$id)->get();

		
		// Films
		$films = PeopleFilm::where('people_id', $id)->get();
		$filmsArray = [];
		foreach ($films as $film) {
			$filmsArray[] = $film->film->url;
		}
		$people['films'] = $filmsArray;

		// Species
		$species = PeopleSpecie::where('people_id', $id)->get();
		$speciesArray = [];
		foreach ($species as $specie) {
			$speciesArray[] = $specie->specie->url;
		}
		$people['species'] = $speciesArray;

		// Vehicles
		$vehicles = PeopleVehicle::where('pilot', $id)->get();
		$vehiclesArray = [];
		foreach ($vehicles as $vehicle) {
			$vehiclesArray[] = $vehicle->vehicle->url;
		}
		$people['vehicles'] = $vehiclesArray;

		// Starships
		$starships = PeopleStarship::where('people_id', $id)->get();
		$starshipsArray = [];
		foreach ($starships as $starship) {
			$starshipsArray[] =$starship->starship->url;
		}
		$people['starships'] = $starshipsArray;

		return response()->json($people);
  }

  public function edit($id)
  {
    echo 'edit';
  }
  public function update(Request $request, $id)
  {
    echo 'update';
  }
  public function destroy($id)
  {
    echo 'destroy';
  }
}
