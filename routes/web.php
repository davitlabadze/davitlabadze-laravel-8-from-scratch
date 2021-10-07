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

// How a route loads a view
Route::get('/hello', function () {
    return ['welcome'];
});

Route::get('/', function () {
    return ['foo' => 'bar']; //return json 
});
