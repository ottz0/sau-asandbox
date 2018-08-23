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



/*  
    REST controllers

    GET /hotels
    GET /hotels/create
    POST /hotels
    GET /posts/{id}/edit
    GET /posts/{id}
    PATCH /posts/{id}
    DELETE /posts/{id}
*/

Route::get('/', function () {
    return view('pages.home');
});


Route::get('/menu', function () {
   return view('pages.menu');
});

Route::get('/addons', function () {
   return view('pages.addons');
});

Route::get('/widgettest', function () {
   return view('pages.widgettest');
});

Route::get('/counters', function () {
   return view('pages.counters');
});

Route::get('/selects', function () {
   return view('pages.selects');
});












Route::get('/hotels', 'HotelsController@index');
Route::get('/hotels/create', 'HotelsController@create');
Route::post('/hotels', 'HotelsController@store');
Route::post('/validation/check-validation', 'HotelsController@validateFormRequest'); //Validates form inline on blur

Route::get('/hotels/{hotel}', 'HotelsController@show');

Route::delete('/hotels/{hotel}', 'HotelsController@delete');
Route::post('/hotels/{hotel}', 'HotelsController@update');
Route::get('/hotels/{hotel}/edit', 'HotelsController@edit');

















// Route::get('/hotels/create', function () {
//     return view('hotels.create');
// });

Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');
