<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::resource('eleves', 'EleveController');
Route::resource('etablissements', 'EtablissementController');
Route::resource('educateurs', 'EducateurController');
Route::resource('bilans', 'BilanController');
Route::resource('plannings', 'PlanningController');
Route::resource('jours', 'JourController');
