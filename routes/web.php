<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PlacesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function(){
    return 'Welcome to my first route';
});

Route::get ('user/{name}/{age?}',function($name,$age=0){
    $msg = 'the username is : ' . $name;
    if($age > 0){
        $msg .= ' and the age is: '. $age ;
    }
    return $msg;
})->whereIn('name',['Peter','Tony']);

Route::prefix('product')->group(function(){

    Route::get('/',function(){
        return 'Products home page';
    });

    Route::get('laptop',function(){
        return 'Laptop page';
    });

    Route::get('camera',function(){
        return 'Camera page';
    });

    Route::get('projector',function(){
        return 'Projectors page';
    });
});

// Route::fallback(function(){
//     return redirect('/');
// });

Route::get('cv',function(){
    return view('cv');
});

// Route::get('login',function(){
//     return view('login');
// });

// Route::post('receive',function(){
//     return 'Data received';
// })->name('receive');

Route::get('login',[ExampleController::class, 'login']);
Route::get('place',[ExampleController::class, 'place']);
Route::get('blog',[ExampleController::class, 'blog']);

Route::post('receive',[ExampleController::class, 'received'])->name('receive');

Route::get('test1',[ExampleController::class, 'test1']);

Route::get('showUpload',[ExampleController::class, 'showUpload']);

Route::post('upload',[ExampleController::class, 'upload'])->name('upload');

Route::post('storeCar',[CarController::class, 'store'])->name('storeCar');

Route::get('addCar',[CarController::class, 'create']);

Route::get('trashed',[CarController::class, 'trashed']);
Route::get('restoreCar/{id}',[CarController::class, 'restore']);

Route::get('cars', [CarController::class, 'index']);

Route::get('deleteCar/{id}', [CarController::class, 'destroy']);

Route::get('carDetails/{id}', [CarController::class, 'show'])->name('carDetails');

Route::get('editCar/{id}', [CarController::class, 'edit']);
Route::put('updateCar/{id}', [CarController::class, 'update'])->name('updateCar');

//**************************************************************** */
Route::get('AddPlaces',[PlacesController::class, 'create']);

Route::post('AddPlaces',[PlacesController::class, 'create'])->name('AddPlaces');

Route::post('receive',[PlacesController::class, 'received'])->name('receive');

Route::post('receive',[PlacesController::class, 'store'])->name('store');
