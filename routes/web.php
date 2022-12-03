<?php

use Illuminate\Support\Facades\Route;
use App\Http\Kernel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // To pass one vlaue
    // return view('welcome')->with('data', 2);

    // To pass multiple values
    return view('welcome')->with(['myname' => 'Moustafa Abuelnour Gaber' , 'age' => 48 ]);

});

Route::get('/test1', function (){
    return ' Welcome ya Darsh :)';
});

// Route Paramters
// Required Paramter(s)
Route::get('/test2/{id}', function (){
    return ' Welcome ya Darsh :) {id}';
});


// Optional Paramter(s)
Route::get('/test3/{id?}', function (){
    return ' Welcome ya Darsh :) 3';
});


// Route Name
Route::get('/show-number/{id}', function (){
    return ' Welcome ya Darsh :) 3';
})->name('a');

Route::get('/show-string/{id?}', function (){
    return ' Welcome ya Darsh :) 3';
})->name('b');

/*
Route::namespace('Front')->group(function (){
    // All route only access controller or methods in folder named Front
    Route::get('users','UserController@showUserName');
});*/

/*
Route::prefix('users')->group(function(){
    Route::get('show','UserController@showUserName');
    Route::get('delete','UserController@showUserName');
    Route::get('edit','UserController@showUserName');
    Route::get('update','UserController@showUserName');
});
*/

// Another way to write Route of Group
/*Route::group(['prefix' => 'users'],function(){
    // Set of routes
    Route::get('/', function (){
        return 'work';
    });
    Route::get('show','UserController@showUserName');
    Route::get('delete','UserController@showUserName');
    Route::get('edit','UserController@showUserName');
    Route::get('update','UserController@showUserName');
});*/

// Middleware
Route::get('check', function (){
    return 'middleware';
}) -> middleware('Front');

// Another way to middleware
/*Route::group(['prefix' => 'users', 'middleware' => 'Front'],function(){
    // Set of routes
    Route::get('/', function (){
        return 'work';
    });
    Route::get('show','UserController@showUserName');
    Route::get('delete','UserController@showUserName');
    Route::get('edit','UserController@showUserName');
    Route::get('update','UserController@showUserName');
});*/

// for second controller = = = App\Http\Controllers\Front\
//Route::get('first', 'FirstController@firstString');
Route::get('/first', [App\Http\Controllers\Front\FirstController::class, 'firstString']);

/*
Route::group(['namespace' => [App\Http\Controllers\Front\FirstController], function(){

    Route::get('/first01', [FirstController::class, 'firstString']);
});

*/
// for second controller
//Route::get('second', 'Admin\SecondController@showString');
Route::get('second', [App\Http\Controllers\Admin\SecondController::class, 'showString']);

// Middleware
Route::get('second02', [App\Http\Controllers\Admin\SecondController::class, 'showString'])->middleware('auth');

Route::get('first02', [App\Http\Controllers\Front\FirstController::class, 'firstString'])->middleware('auth');

Route::get('login', function (){
    return 'You must be login to access this route!!!!';
})->name('login');

Route::get('secondsh1', [App\Http\Controllers\Admin\SecondController::class, 'showString1']);
Route::get('secondsh2', [App\Http\Controllers\Admin\SecondController::class, 'showString2']);

// Using Route Resource
Route::resource('news', App\Http\Controllers\NewsController::class); //'NewsController');

Route::get('userindex', [\App\Http\Controllers\Front\UserController::class, 'getIndex']);
Route::get('userobj', [\App\Http\Controllers\Front\UserController::class, 'getObject']);

Route::get('/landing', function (){
    return view('landing');
});

Route::get('/about', function (){
    return view('about');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
