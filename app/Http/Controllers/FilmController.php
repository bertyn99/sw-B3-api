<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;

class FilmController extends Controller
{
    public function index() {
    //liste de tous les élements
     return response()->json(Film::all());
   }
   public function show($id) {
      $film = Film::find($id);
      dd($film->starshipURL);
      dd($film->peopleURL);
      dd($film->vehicleURL);
      dd($film->specieURL);
      dd($film->planetURL);
      return response()->json($film,200);
   }
}
