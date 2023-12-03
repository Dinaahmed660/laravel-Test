<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CoffeeController;


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
//*************************************************/
            //coffee project
Route::get('loginE',function(){
return view("loginC");
});

Route::post('recieve',[CoffeeController::class,'recie'])->name('recie');
Route::get('testy',[CoffeeController::class,'create']);
Route::post('Storecoffee',[CoffeeController::class,'store'])->name('storecoffee');
Route:: get ('coffeelist',[CoffeeController::class,'index']);



//************************************* */
             //News project
             
Route::post('storeNews',[NewsController::class, 'store'])->name('storeNews');

Route::get('addNews',[NewsController::class, 'create']);

Route::get('trashed',[NewsController::class, 'trashed']);
Route::get('restoreNews/{id}',[NewsController::class, 'restore']);

Route::get('News', [NewsController::class, 'index']);

Route::get('editNews/{id}', [NewsController::class, 'edit']);

Route::get('deleteNews/{id}', [NewsController::class, 'destroy']);

Route::get('NewsDetails/{id}', [NewsController::class, 'show'])->name('NewsDetails');

Route::put('updateNews/{id}', [NewsController::class, 'update'])->name('updateNews');


//***************************************** */
             //cars Project
Route::get('login',[ExampleController::class, 'login']);

Route::post('receive',[ExampleController::class, 'received'])->name('receive');

Route::get('test1',[ExampleController::class, 'test1']);

Route::post('storeCar',[CarController::class, 'store'])->name('storeCar');

Route::get('addcar',[CarController::class, 'create']);

Route::get('trashed',[CarController::class, 'trashed']);
Route::get('restoreCar/{id}',[CarController::class, 'restore']);

Route::get('cars', [CarController::class, 'index']);

Route::get('editCar/{id}', [CarController::class, 'edit']);

Route::get('deleteCar/{id}', [CarController::class, 'destroy']);

Route::get('carDetails/{id}', [CarController::class, 'show'])->name('carDetails');

Route::put('updateCar/{id}', [CarController::class, 'update'])->name('updateCar');