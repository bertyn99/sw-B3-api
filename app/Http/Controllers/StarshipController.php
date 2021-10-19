<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Starship;
use App\Models\FilmStarship;

use App\Models\PeopleStarship;


class StarshipController extends Controller
{
  /**
   * @OA\Get(
   *      path="/v1/starship",
   *      operationId="getAllStarship",
   *      tags={"Starship"},
   *      summary="Get List Of Starship",
   *      description="Returns all starship and associated people, film",
   * 
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
    public function index() {
        //liste de tous les élements
        $starships = Starship::all();
        foreach ($starships as $starship) {
    
          // Peoples
          $peoples = PeopleStarship::where('starship_id',  $starship->id)->get();
          $peopleArray = [];
          foreach ($peoples as $people) {
            $peopleArray[] = $people->people->url;
          }
          $starship['pilots'] = $peopleArray;
    
          // Films
          $films = FilmStarship::where('starship_id',  $starship->id)->get();
          $filmArray = [];
          foreach ($films as $film) {
            $filmArray[] =$film->film->url;
          }
          $starship['films'] = $filmArray;
        }
        return response()->json($starships);
       }

       /**
   * @OA\Get(
   *      path="/v1/starship/{id}",
   *      operationId="getAStarship",
   *      tags={"Starship"},
   *      summary="Get a starship",
   *      description="Returns a starship and associated people, film",
   *      @OA\Parameter(
   *        name="starship",
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
      $starship = Starship::find($id);

  
      // Peoples
      $peoples = PeopleStarship::where('starship_id', $id)->get();
      $peopleArray = [];
      foreach ($peoples as $people) {
        $peopleArray[] = $people->people->url;
      }
      $starship['pilots'] = $peopleArray;
  
      // Films
      $films = FilmStarship::where('starship_id', $id)->get();
      $filmArray = [];
      foreach ($films as $film) {
        $filmArray[] = $film->film->url;
      }
      $starship['films'] = $filmArray;
  
      return $starship;
       }
    public function store(Request $request)
       {
         echo 'store';
       }

    
}
