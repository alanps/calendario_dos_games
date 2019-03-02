<?php


use \App\Http\Middleware\PrimeiroMiddleware;

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
    return view('index');
})->name('index');


Route::get('/games', function () {
    return view('games');
})->name('games');


Route::get('/sobre', function () {
    return view('sobre');
})->name('sobre');
