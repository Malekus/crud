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


Route::get('/eductaeur', 'EducateurController@index')
    ->name('educateur.index');

Route::get('/eductaeur/create', 'EducateurController@create')
    ->name('educateur.create');

/*
Route::get('/partenaire/create', 'PartenaireController@create')
    ->name('partenaire.create');
Route::post('/partenaire/list', 'PartenaireController@list_')
    ->name('partenaire.list');
Route::get('/partenaire/{partenaire}', 'PartenaireController@show')
    ->name('partenaire.show')
    ->where('partenaire', '[0-9]+');
Route::post('/partenaire', 'PartenaireController@store')
    ->name('partenaire.store');
*/
