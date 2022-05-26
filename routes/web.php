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

Route::get('/2', function () {
    return view('seconds',['name' => 'Samantha','users'=>[]]);
});

Route::get('/csrf', function () {
    return view('csrf');
});

Route::get('/3', function () {
    return 'Hello World,This is Route of 3';
});

Route::get('/5', function () {
    return 'Hello World,This is Route of 5';
});
