<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Starship;


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
         return response()->json(Starship::all());
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
          dd($starship->filmURL);
          dd($starship->peopleUrl);
          return response()->json($starship,200);
       }
    public function store(Request $request)
       {
         echo 'store';
       }

    
}
