<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coffee;

class CoffeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coffees = Coffee::get();
        return view('coffeelist', compact('coffees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('addCoffee');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {//طريقه حفظ الداتا اللي حتدخل من الفورم تتسجل في الداتا بيز
        $coffees = new Coffee;
        $coffees->coffeeTitle =$request-> coffeeTitle;
        $coffees->description =$request-> description;
        if (isset($request-> published)){
            $coffees->published =true;
        }else{
            $coffees->published =false;
        }
        $coffees->save();
        return 'Data saved';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
