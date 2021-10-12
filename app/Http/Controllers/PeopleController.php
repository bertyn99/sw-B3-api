<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;

class PeopleController extends Controller
{
    //
    public function index() {
        //liste de tous les élements
             return response()->json(People::all());
           }
        
           public function store(Request $request) {
             echo 'store';
           }
           public function show($id) {
                 return response()->json(People::find($id));
              
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
