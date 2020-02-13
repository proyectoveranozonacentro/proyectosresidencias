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

Auth::routes();

Route::get('/home', 'HomeConv troller@index')->name('home');
route::resource("registro","veranocientificocontroller");

Route::get('/perfil', function () {
    return view('perfil');
});

Route::get('/acceso', function () {
    return view('acceso');
});

Route::get('/proyectos', function() {
    return view('proyectos');
});

Route::get('/registro',function() {
    return view('registro');
});

