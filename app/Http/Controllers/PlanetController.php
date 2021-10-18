<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Planet;


class PlanetController extends Controller
{
    /**
   * @OA\Get(
   *      path="/planet",
   *      operationId="getAllPlanet",
   *      tags={"Tests"},

   *      summary="Get List Of Planet",
   *      description="Returns all planet and associated people, film, specie",
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
        $planet = Planet::with(['residents:url', 'films:url', 'species:url' ])->get() ; 

        return response()->json($planet) ; 
             //return response()->json(Planet::all());
           }

           public function store(Request $request) {
             echo 'store';
            }
            /**
   * @OA\Get(
   *      path="/planet/{id}",
   *      operationId="getAPlanet",
   *      tags={"Tests"},

   *      summary="Get a planet",
   *      description="Returns a planet and associated people,film, specie.",
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
           public function show($id) {
            $planet = Planet::with(['residents:url','films:url', 'species:url'])->find($id);

              //$planet->films ;

              return response()->json($planet,200);
           }
           public function edit($id) {
              echo 'edit';
           }
           public function update(Request $request, $id) {
                echo 'update';
           }
           public function destroy($id) {
              echo 'destroy';
           }
        }
}
