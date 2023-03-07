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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/demo_url', '\App\Http\Controllers\DemoController@test');

Route::get('/', '\App\Http\Controllers\TargetController@index');

Route::get('/create', '\App\Http\Controllers\TargetController@create');
Route::post('/create', '\App\Http\Controllers\TargetController@store');

Route::get('/edit/{target}', '\App\Http\Controllers\TargetController@edit');
Route::put('/edit/{target}', '\App\Http\Controllers\TargetController@update');

Route::get('/delete/{target}', '\App\Http\Controllers\TargetController@delete');