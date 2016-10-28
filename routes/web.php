<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// User interface
Route::group(['as' => 'user::', 'middleware' => ['auth']], function () {
    Route::get('/hashes', ['as' => 'hashes', 'uses' => 'HomeController@index']);
    Route::post('/hash', ['as' => 'hash.save', 'uses' => 'HashController@store']);
    Route::delete('/hash/{hash}', ['as' => 'hash.delete', 'uses' => 'HashController@destroy']);

});

// Rest api
Route::group(['as' => 'api::', 'middleware' => ['auth']], function () {
    Route::get('/api/hashes', ['as' => 'api/hashes', 'uses' => 'HashController@index']);
    Route::get('/api/hashes/{id}', ['as' => 'api/hashes/id', 'uses' => 'HashController@show']);

});

// Main intarface
Route::get('/', ['as' => 'HashGenerator::get', 'uses' => 'VocabularyController@index']);
Route::post('/', ['as' => 'HashGenerator::post', 'uses' => 'VocabularyController@hashView']);

// Auth routes
Auth::routes();


