<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/turma/store', 'TurmaApiController@store');

Route::get('/turma', 'TurmaApiController@index');

Route::put('/turma/update/{id}', 'TurmaApiController@update');

Route::get('/turma/{id}', 'TurmaApiController@show');

Route::delete('/turma/{id}', 'TurmaApiController@destroy');

Route::post('/turma/search', 'TurmaApiController@search');
