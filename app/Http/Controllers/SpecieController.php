<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Specie;


class SpecieController extends Controller
{
    /**
   * @OA\Get(
   *      path="/v1/specie",
   *      operationId="getAllSpecie",
   *      tags={"Specie"},

   *      summary="Get List Of Specie",
   *      description="Returns all specie and associated people, film, planet",
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
    $specie = Specie::with(['planets:url','films:url', 'people:url' ])->get() ; 

    return response()->json($specie) ; 
         //return response()->json(Planet::all());
       }

       public function store(Request $request) {
         echo 'store';
        }
/**
* @OA\Get(
*      path="/v1/specie/{id}",
*      operationId="getASpecie",
*      tags={"Specie"},
*        
*      summary="Get a specie",
*      description="Returns a specie and associated people,film, planet.",
*      security={{"apiAuth":{}}},
*      @OA\Parameter(
*        name="specie",
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
        $specie = Specie::with(['planets:url','films:url', 'people:url'])->find($id);

          //$planet->films ;

          return response()->json($specie,200);
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
