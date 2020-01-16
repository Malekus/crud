<?php

Route::middleware('auth')->group(function () {
    Route::get('/', 'EleveController@index');

    Route::get('/eductateur', 'EducateurController@index')
        ->name('educateur.index');

    Route::get('/eductateur/create', 'EducateurController@create')
        ->name('educateur.create');

    Route::get('/eleve', 'EleveController@index')
        ->name('eleve.index');

    Route::get('/eleve/{id}', 'EleveController@show')
        ->name('eleve.show');

    Route::get('/planning', 'PlanningController@index')
        ->name('planning.index');

    Route::post('/ajax/jour', 'AjaxController@jour')
        ->name('ajax.jour');

    Route::get('/ajax/test', 'AjaxController@test')
        ->name('ajax.test');

    Route::get('/statistique', 'StatistiqueController@index')
        ->name('statistique.index');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

