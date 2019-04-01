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
    return view('header/header');
});

Route::get('/login', function () {
    return view('content/login');
});

Route::get('/alugar', function () {
    return view('content/login');
});
