<?php

use Illuminate\Support\Facades\Route;

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

Route::get('user/{name}/{age?}', function($name, $age=0){
    if ( $age!==0){
        return 'this user name is : ' . $name . ' and my age is : ' . $age ;
    }
    else {
        return 'this user name is : ' . $name;}
    })->whereIn('name',['Dina','Masa']);
    //->where(['name'=>'[a-zA-Z-0-9]+' , 'age'=>'[0-9]+']);//->whereNumber('age'); // Methode where number
// })->where(['age' =>'[0-9]+']); .... special char way
    //->whereAlpha('name');....... special char way


    Route:: prefix('product')-> group(function(){
        Route::get('laptop', function(){
            return 'laptop page';
        });

        Route::get('camera', function(){
            return 'camera page';
        });
    });

    //************************ task */
    Route::get('about', function(){
        return 'Welcome to my about page';
    });
    Route::get('contact', function(){
        return 'Welcome to contact page';
    });
    Route:: prefix('support')-> group(function(){
        Route::get('chat', function(){
            return 'chat page';
        });

        Route::get('call', function(){
            return 'call page';
        });
        Route::get('ticket', function(){
            return 'ticket page';
        });
    });

    Route:: prefix('Training')-> group(function(){
        Route::get('HR', function(){
            return 'HR page';
        });

        Route::get('ICT', function(){
            return 'ICT page';
        });
        Route::get('Marketing', function(){
            return 'Marketing page';
        });
        Route::get('logistic', function(){
            return 'logistic page';
        });
    });