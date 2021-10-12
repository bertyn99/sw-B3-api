<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StarshipController extends Controller
{
    public function index() {
        //liste de tous les élements
         return response()->json(Starship::all());
       }
       public function show($id) {
          $starship = Starship::find($id);
          return response()->json($starship,200);
       }
}
