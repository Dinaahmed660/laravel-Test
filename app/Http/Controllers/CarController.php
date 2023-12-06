<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Car;
use Symfony\Component\HttpFoundation\Test\Constraint\ResponseIsRedirected;
use App\Traits\Common;

class CarController extends Controller
{ use Common;
    private $columns = ['carTitle', 'description','published'];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::get();
        return view('cars', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addCar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $cars = new Car;
        // $cars->carTitle = $request->title;
        // $cars->description = $request->description;
        // $data = ($request->only($this->columns));
        // $data['published']=isset ($data['published'])?true:false;
        $massages=['carTitle.required'=>'العنوان مطلوب',
        'description.required'=>'should be text'
    ];
        
       $data= $request->validate([
            'carTitle'=>'required|string|max:5',
            'description'=> 'required|string',
            'image'=>'required|mimes:png,jpg,jpeg|max:2048',
            ],$massages); 
            $filename=$this->uploadFile($request->image,'assets\images');
            $data['image']= $filename;
            $data['published']=isset($request['published']) ;  
            Car::create($data);
            return 'done';

        // if(isset($request->published)){
        //     $cars->published = true;
        // }else{
        //     $cars->published = false;
        // }
        // $cars->save();
        // return "Car data added successfully";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::findOrFail($id);
        return view('carDetails',compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::findOrFail($id);
        return 'done';
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // $data = $request->only($this->columns);
        // $data['published'] = isset($data['published'])? true:false;

        // Car::where('id', $id)->update($data);
        $massages=['carTitle.required'=>'Enter the title',
        'description.required'=>'should be text'
    ];
   
       $data= $request->validate([
            'carTitle'=>'required|string|max:5',
            'description'=> 'required|string',
            'image'=>'required|mimes:png,jpg,jpeg|max:2048',
            ],$massages); 
            $filename=$this->uploadFile($request->image,'assets\images');
            $data['image']= $filename;
            $data['published']=isset($request['published']) ; 

            @foreach($data as $row)
                $data['carTitle']=$row['carTitle'];
                $data['description']=$row['description'];
                $data['published']=$row['published'];
                $data['image']=$row['image'];
            @endforeach
  
        Car::where('id', $id)->update($request->only($this->columns));
        return view('updateCar',compact('car'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Car::where('id', $id)->delete();
        return redirect('cars');
    }

    public function trashed(){
        $cars = Car::onlyTrashed()->get();
        return view('trashed', compact('cars'));
    }

    public function restore(string $id): RedirectResponse
    {
        Car::where('id', $id)->restore();
        return redirect('cars');
    }
}
