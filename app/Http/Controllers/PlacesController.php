<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Place;

class PlacesController extends Controller
{
    // use Common;
    // private $columns = ['carTitle','description','from','to','published'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $places = Place::get();
        return view('places', compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view("addPlaces");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $messages= $this->messages();

        $data = $request->validate([
            'Title'=>'required|string',
            'description'=>'required|string',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ], $messages);

        $fileName = $this->uploadFile($request->image, 'assets/images');
        $data['image']= $fileName;
        $data['published'] = isset($request->published);
        Place::create($data);

        return 'done';
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
