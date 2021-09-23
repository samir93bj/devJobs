<?php

use App\Http\Controllers\VacanteController;
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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

//RUTAS PROTEGIDAS

Route::group(['middleware' => ['auth','verified']], function() {
    //RUTAS PARA VACANTES

    Route::get('/vacantes/create','VacanteController@create')->name('vacantes.create');
    Route::post('vacantes/store','VacanteController@store')->name('vacantes.store');
    Route::delete('/vacantes/{vacante}','VacanteController@destroy')->name('vacantes.destroy');
    Route::get('/vacantes/{vacante}/edit','VacanteController@edit')->name('vacantes.edit');
    Route::put('/vacantes/{vacante}','VacanteController@update')->name('vacantes.update');



    //RUTA PARA SUBIR IMAGEN
    Route::post('/vacantes/imagen','VacanteController@imagen')->name('vacantes.imagen');
    Route::post('/vacantes/borrarimagen','VacanteController@borrarimagen')->name('vacantes.borrar');

    //CAMBIAR ESTADO DE LA VACANTE
    Route::post('/vacantes/{vacante}','VacanteController@estado')->name('vacantes.estado');

    //NOTIFICACIONES
    Route::get('/notificaciones','NotificacionesController')->name('notificaciones');

});

    //PAGINA DE INICIO
    Route::get('/','InicioController')->name('inicio');

    //CATEGORIAS
    Route::get('/categorias/{categoria}','CategoriaController@show')->name('categorias.show');

    //ENVIAR DATOS PARA UNA VACANTE
    Route::get('/candidatos/{id}','CandidatoController@index')->name('candidatos.index');
    Route::post('/candidatos/store','CandidatoController@store')->name('candidato.store');

    //Muestra las vacantes en el frontend sin la necesidad de estar autenticado
    Route::get('/busqueda/buscar','VacanteController@resultados')->name('vacantes.resultados');
    Route::post('/busqueda/buscar','VacanteController@buscar')->name('vacantes.buscar');
    Route::get('vacantes/{vacante}','VacanteController@show')->name('vacantes.show');
    Route::get('/vacantes','VacanteController@index')->name('vacantes.index');

//
