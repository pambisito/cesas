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

Route::get('/contacto', function () {
    return view('inicio.contacto');
})->name('contacto');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('academia', 'AcademiaController');

Route::resource('colegio', 'ColegioController');

Route::resource('profesor', 'ProfesorController');

Route::resource('curso', 'CursoController');
