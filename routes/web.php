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

Route::get('/', 'HomeController@index');


Route::get('/eductateur', 'EducateurController@index')
    ->name('educateur.index');

Route::get('/eductateur/create', 'EducateurController@create')
    ->name('educateur.create');

Route::get('/eleve', 'EleveController@index')
    ->name('eleve.index');

Route::get('/eleve/{id}', 'EleveController@show')
    ->name('eleve.show');
