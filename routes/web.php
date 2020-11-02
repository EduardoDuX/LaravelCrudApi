<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::get('/', function () {
    return view('welcome');
});

/*
Route::get('/aluno', function () {
    return view('aluno');
});
*/

Auth::routes();

Route::get('/home', [  HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function(){
  Route::get('/aluno', 'AlunoController@index');
  Route::get('/aluno/edit/{id}', 'AlunoController@edit');
  Route::get('/aluno/remove/{id}', 'AlunoController@remove');
  Route::post('/aluno/search/', 'AlunoController@search');
  Route::post('/aluno/update/', 'AlunoController@update');
  Route::get('/aluno/create', "AlunoController@create"); // carregar o formulário
  Route::post('/aluno/store', 'AlunoController@store'); // salvar os dados do formulário

  Route::get('/curso', 'CursoController@index');
  Route::get('/curso/create', "CursoController@create"); // carregar o formulário
  Route::post('/curso/store', 'CursoController@store'); // salvar os dados do formulário
  Route::get('/curso/edit/{id}', 'CursoController@edit');
  Route::get('/curso/remove/{id}', 'CursoController@remove');
  Route::post('/curso/update/', 'CursoController@update');
  Route::post('/curso/search/', 'CursoController@search');

  Route::get('/turma', 'TurmaController@index');
  Route::get('/turma/create', "TurmaController@create"); // carregar o formulário
  Route::post('/turma/store', 'TurmaController@store'); // salvar os dados do formulário
  Route::get('/turma/edit/{id}', 'TurmaController@edit');
  Route::get('/turma/remove/{id}', 'TurmaController@remove');
  Route::post('/turma/update/', 'TurmaController@update');
});
