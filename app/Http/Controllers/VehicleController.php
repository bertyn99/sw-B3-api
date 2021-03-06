<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\FilmVehicle;
use App\Models\PeopleFilm;
use App\Models\PeopleVehicle;
use App\Models\Vehicle;


class VehicleController extends Controller
{
    /**
   * @OA\Get(
   *      path="/v1/vehicle",
   *      operationId="getAllVehicle",
   *      tags={"Vehicle"},
   *      summary="Get List Of Vehicle",
   *      description="Returns all vehicle and associated people",
   *      @OA\Response(
   *          response=200,
   *          description="Successful operation",
   *          @OA\MediaType(
   *           mediaType="application/json",
   *      )
   *      ),
   *        security={{"apiAuth":{}}},
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
        $vehicles = Vehicle::all();
		foreach ($vehicles as $vehicle) {

			// Peoples
			$peoples = PeopleVehicle::where('vehicle_id', $vehicle->id)->get();
			$peoplesArray = [];
			foreach ($peoples as $people) {
				$peoplesArray[] =$people->people->url;
			}
			$vehicle['pilots'] = $peoplesArray;

			// Films
			$films = FilmVehicle::where('vehicle_id', $vehicle->id)->get();
			$filmsArray = [];
			foreach ($films as $film) {
				$filmsArray[] =$film->film->url;
			}
			$vehicle['films'] = $filmsArray;
		}
		return response()->json($vehicles);
    }

    public function store(Request $request)
    {
             echo 'store' ;
    }
    /**
   * @OA\Get(
   *      path="/v1/vehicle/{id}",
   *      operationId="getAVehicle",
   *      tags={"Vehicle"},
   *      summary="Get a vehicle",
   *      description="Returns a vehicle and associated people",
   *      @OA\Parameter(
   *        name="vehicle",
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
        $vehicle = Vehicle::find($id);

		// Peoples
		$peoples = PeopleVehicle::where('vehicle_id', $id)->get();
		$peoplesArray = [];
		foreach ($peoples as $people) {
			$peoplesArray[] =$people->people->url;
		}
		$vehicle['pilots'] = $peoplesArray;

		// Films
		$films = FilmVehicle::where('vehicle_id', $id)->get();
		$filmsArray = [];
		foreach ($films as $film) {
			$filmsArray[] =$film->film->url;
		}
		$vehicle['films'] = $filmsArray;

		return $vehicle;
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
