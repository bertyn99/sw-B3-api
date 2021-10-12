<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;

class PeopleController extends Controller
{
    //
    public function index() {
        //liste de tous les élements
        $person = People::with(['vehicles:url','species', 'homeworld'])->get();
             return response()->json($person);
           }
        
           public function store(Request $request) {
             echo 'store';
           }
           public function show($id) {
               $person = People::with(['vehicles:url','species', 'homeworld'])->find($id);
             //
               return response()->json($person);
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
