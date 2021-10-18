<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Vehicle;


class VehicleController extends Controller
{
    /**
   * @OA\Get(
   *      path="/vehicle",
   *      operationId="getAllVehicle",
   *      tags={"Tests"},

   *      summary="Get List Of Vehicle",
   *      description="Returns all vehicle and associated people",
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
    public function index()
    {
        //liste de tous les élements
        $vehicle = Vehicle::with(['peoples:url'])->get() ; 

       //return response()->json(Vehicle::all());
       return response()->json($vehicle)
    }

    public function store(Request $request)
    {
             echo 'store' ;
    }
    /**
   * @OA\Get(
   *      path="/vehicle/{id}",
   *      operationId="getAVehicle",
   *      tags={"Tests"},

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
        $vehicle = Vehicle::with(['peples:url'])->find($id);
        return response()->json($vehicle,200);
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
