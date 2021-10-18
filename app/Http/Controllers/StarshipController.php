<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StarshipController extends Controller
{
  /**
   * @OA\Get(
   *      path="/starship",
   *      operationId="getAllStarship",
   *      tags={"Tests"},

   *      summary="Get List Of Starship",
   *      description="Returns all starship and associated people, film",
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
         return response()->json(Starship::all());
       }
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

    /**
   * @OA\Get(
   *      path="/starship/{id}",
   *      operationId="getAStarship",
   *      tags={"Tests"},

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
}
