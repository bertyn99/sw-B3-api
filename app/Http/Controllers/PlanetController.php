<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planet;


class PlanetController extends Controller
{
    public function index() {
        //liste de tous les élements
        $planet = Planet::with(['residents:url', 'films:url', 'species:url' ])->get() ; 

        return response()->json($planet) ; 
             //return response()->json(Planet::all());
           }

           public function store(Request $request) {
             echo 'store';
            }
           }
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
