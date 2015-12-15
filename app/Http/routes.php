<?php

defined('DS') or DEFINE('DS', DIRECTORY_SEPARATOR);

Route::get( '/', 'MainController@index' );

Route::get( 'home', 'MainController@index' );

Route::get( 'services', 'ServiceController@index' );

Route::get( 'photogalleries', 'PhotogalleryController@index' );

Route::get( 'collections', 'CollectionController@index' );

Route::get( 'news', 'NewsController@index' );

Route::get('contacts', function()
{
	return View::make('contacts');
});

Route::post('contacts', 'ContactController@store');

Route::group(array('prefix' => 'administration'), function()
{
    Route::get( '/', 'Admin'.DS.'UserController@getLogin' );

    Route::get( 'login', 'Admin'.DS.'UserController@getLogin' );

    Route::post( 'login', 'Admin'.DS.'UserController@postLogin' );

    Route::get('reset/password', 'Admin'.DS.'PasswordController@getEmail');

    Route::post( 'reset/password', 'Admin'.DS.'PasswordController@postEmail' );

    Route::get('password/reset', 'Admin'.DS.'PasswordController@getReset');

    Route::post( 'password/reset', 'Admin'.DS.'PasswordController@postReset' );
});

Route::get( 'log-out', 'Admin'.DS.'UserController@getLogout' );

Route::get('{bad_url}', function () {
    return View::make('404');
})
->where('bad_url', '^\/{0,1}(.*\/{0,1}){0,}');