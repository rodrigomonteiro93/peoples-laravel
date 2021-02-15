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

Route::get('/', 'PessoaController@index')->name('index');
Route::post('store', 'PessoaController@store')->name('pessoa.store');
Route::put('update/{id}', 'PessoaController@update')->name('pessoa.update');
Route::get('destroy/{id}', 'PessoaController@destroy')->name('pessoa.destroy');
Route::get('show/{id}', 'PessoaController@show')->name('show');
Route::get('clear', 'PessoaController@clear')->name('pessoa.clear');
