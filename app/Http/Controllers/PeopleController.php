<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;


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
    $person = People::with(['vehicles:url', 'species', 'homeworld'])->get();
    return response()->json($person);
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
    $person = People::with(['vehicles:url', 'species', 'homeworld'])->find($id);
    //
    return response()->json($person);
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
