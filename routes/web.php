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

Route::get('/', ['as' => 'HashGenerator::get', 'uses' => 'VocabularyController@index']);
Route::post('/', ['as' => 'HashGenerator::post', 'uses' => 'VocabularyController@hashView']);

Route::group(['as' => 'user::', 'middleware' => ['auth']], function () {
    Route::resource('hash', 'HashController');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
