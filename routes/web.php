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

Route::view('/contacto', 'inicio.contacto')->name('contacto');

Route::redirect('/ciclo', '/ciclo/semestral-san-marcos');
Route::view('/ciclo/semestral-san-marcos', 'inicio.ciclo.semestral-san-marcos')->name('ciclo1');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/academia/notas', 'AcademiaController@notaGeneral')->name('academia.reporteNotaGeneral');
Route::get('/academia/notasMensual', 'AcademiaController@obtenerMes')->name('academia.obtenerMes');
Route::get('/academia/notasMensual/{mes}', 'AcademiaController@mostrarNotasMes')->name('academia.mostrarNotasMensual');
Route::post('/academia/actualizarMes', 'AcademiaController@actualizarMes')->name('academia.actualizarMes');
Route::get('/academia/notasDescargar', 'AcademiaController@reporteNotasPDF')->name('academia.reporteNotasDescargar');

Route::resource('academia', 'AcademiaController');

Route::resource('colegio', 'ColegioController');

Route::resource('profesor', 'ProfesorController');

Route::resource('curso', 'CursoController');

Route::resource('asistencia', 'AsistenciaController');

Route::get('examen/ingresarNotas', 'ExamenController@obtenerFecha')->name('examen.obtenerFecha');
Route::get('examen/ingresarNotas/{fecha}', 'ExamenController@ingresarNotas')->name('examen.ingresarNotas');
Route::post('examen/actualizarFecha', 'ExamenController@actualizarFecha')->name('examen.actualizarFecha');
Route::post('examen/registrarNotas', 'ExamenController@actualizarNotas');

Route::resource('examen', 'ExamenController');



