<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\FilmPlanet;
use App\Models\Planet;


class PlanetController extends Controller
{
   /**
    * @OA\Get(
    *      path="/v1/planet",
    *      operationId="getAllPlanet",
    *      tags={"Planet"},

    *      summary="Get List Of Planet",
    *      description="Returns all planet and associated people, film, specie",
    *      @OA\Response(
    *          response=200,
    *          description="Successful operation",
    *          @OA\MediaType(
    *           mediaType="application/json",
    *      )
    *      ),
    *      security={{"apiAuth":{}}},
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
      $planet = Planet::with(['residents:url', 'films:url', 'species:url'])->get();

      return response()->json($planet);
      //return response()->json(Planet::all());
   }

   public function store(Request $request)
   {
      echo 'store';
   }
   /**
    * @OA\Get(
    *      path="/v1/planet/{id}",
    *      operationId="getAPlanet",
    *      tags={"Planet"},
    *        
    *      summary="Get a planet",
    *      description="Returns a planet and associated people,film, specie.",
    *      security={{"apiAuth":{}}},
    *      @OA\Parameter(
    *        name="planet",
    *        in="path",
    *        required=true,
    *        @OA\Schema(
    *           type="string"
    *           )
    *        ),
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
      $planet = Planet::with('residents')->where('id', $id)->get();;


      // Films
      $films = FilmPlanet::where('planet_id', $id)->get();
      $filmsArray = [];
      foreach ($films as $film) {
         $filmsArray[] = $film->film->url;
      }
      $planet['films'] = $filmsArray;

      return response()->json($planet);
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
