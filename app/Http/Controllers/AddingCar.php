<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddingCar extends Controller
{
       // calling function of adding car
       public function test(){
        return view("addcar");
    }

          // calling function of adding car
          public function store(Request $request){
            dd($request->all());
        }
}
