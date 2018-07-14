<?php

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
// Auth::routes();
Route::get('/','HomeController@index');
Route::prefix('user')->group(function(){
    Route::middleware(['guest'])->group(function(){
        Route::get('login','UserController@getLogin')->name('login');
        Route::post('login','UserController@login')->name('login');
    });
    Route::get('logout','UserController@logout')->name('logout');

    // Route::middleware(['numtwo'])->group(function(){
        Route::get('list','UserController@list');
    // });
    
    Route::get('session','UserController@getSession');

    Route::prefix('register')->group(function(){
        Route::get('/','UserController@register');
        Route::post('/','UserController@createUser');
    });
});
Route::middleware(['auth'])->group(function(){
    Route::prefix('product')->group(function(){
        Route::get('/','ProductController@index');
        Route::get('list','ProductController@list');
        Route::get('loadData','ProductController@loadData')->name('product.loadData');
    });
});

// Route::get('/', function () {
//     return view('welcome');
// });



// Route::get('/home', 'HomeController@index')->name('home');
