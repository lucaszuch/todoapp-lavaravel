<?php

use Illuminate\Support\Facades\Route;

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

//Gets landing page
Route::get('/', function () {
    return view('welcome');
});

//Get todos page
Route::get('todos', 'App\Http\Controllers\TodosController@index');

//Dynamically gets specific todo
Route::get('todos/{todo}', 'App\Http\Controllers\TodosController@show');

//Create new todo
Route::get('create', 'App\Http\Controllers\TodosController@create');
Route::post('store', 'App\Http\Controllers\TodosController@store');

//Edit todo
Route::get('todos/{todo}/edit', 'App\Http\Controllers\TodosController@edit');
Route::post('todos/{todo}/update', 'App\Http\Controllers\TodosController@update');

//Delete todo
Route::get('todos/{todo}/delete', 'App\Http\Controllers\TodosController@delete');

//Complete todo
Route::get('todos/{todo}/complete', 'App\Http\Controllers\TodosController@complete');