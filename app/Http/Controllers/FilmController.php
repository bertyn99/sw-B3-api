<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;

class FilmController extends Controller
{
   /**
   * @OA\Get(
   *      path="/film",
   *      operationId="getAllFilm",
   *      tags={"Tests"},

   *      summary="Get List Of Film",
   *      description="Returns all film and associated people, vehicle, specie, planet, starship",
   *      @OA\Response(
   *          response=200,
   *          description="Successful operation",
   *          @OA\MediaType(
   *           mediaType="application/json",
   *      )
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
    public function index() {
    //liste de tous les élements
     return response()->json(Film::all());
   }

    /**
   * @OA\Get(
   *      path="/film/{id}",
   *      operationId="getAFilm",
   *      tags={"Tests"},

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
      dd($film->starshipURL);
      dd($film->peopleURL);
      dd($film->vehicleURL);
      dd($film->specieURL);
      dd($film->planetURL);
      return response()->json($film,200);
   }
   public function store(Request $request) 
   {
      echo 'store';
   }
  
}
