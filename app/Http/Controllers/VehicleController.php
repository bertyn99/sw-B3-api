<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Vehicle;


class VehicleController extends Controller
{
    public function index()
    {
        //liste de tous les élements
        $vehicle = Vehicle::with(['peoples:url'])->get() ; 

       //return response()->json(Vehicle::all());
       return response()->json($vehicle)
    }

    public function store(Request $request)
    {
             echo 'store'
    }

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
