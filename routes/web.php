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

Route::post('/dialogflow', ['as' => 'dialogflow', 'uses' => 'DialogflowController@index']);
Route::post('/ironio', ['as' => 'ironio', 'uses' => 'IronioController@index']);

Route::get('/', function () {
    return view('welcome');
});
