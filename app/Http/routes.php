<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware' => ['web']], function () {


    Route::get('login', 'Auth\AuthController@showLoginForm');
    Route::post('login', 'Auth\AuthController@login');
    Route::get('logout', 'Auth\AuthController@logout');
    Route::get('register', ['middleware' => 'auth', 'uses' => 'Auth\AuthController@showRegistrationForm']); //Removed this line
    Route::post('register', 'Auth\AuthController@register');

    Route::get('/', [
    'as' => 'home',
    'uses' => 'PagesController@getHome'
    ]);

    Route::get('contact', ['middleware' => 'auth', 'uses' => 'ContactController@index']);
    Route::get('registration', ['middleware' => 'auth', 'uses' => 'RegistrationController@index']);


    Route::resource('registration','RegistrationController', ['except' => [
    'index']]);

    Route::resource('map','MapController');
    Route::resource('download','DownloadController');

    Route::resource('contact','ContactController', ['except' => [
    'index']]);

    Route::get('import',[
    'as' => 'import',
    'uses' => 'ExcelController@getImport']);
    Route::post('import',[
    'as' => 'import',
    'uses' => 'ExcelController@postImport']);

});
