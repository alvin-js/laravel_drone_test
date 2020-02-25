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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/A', function () {
    return view('welcomeA');
});

Route::get('/B', function () {
    return view('welcomeB');
});

Route::get('/C', function () {
    return view('welcomeC');
});

Route::get('/D', function () {
    return view('welcomeD');
});

