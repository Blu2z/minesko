<?php

defined('DS') or DEFINE('DS', DIRECTORY_SEPARATOR);

Route::get( '/', 'MainController@index' );

Route::get( 'home', 'MainController@index' );

Route::get('about', function()
{
	return View::make('about');
});

Route::get( 'services', 'ServiceController@index' );

Route::get( 'services/{alias}', 'ServiceController@show' )
    ->where( 'alias', '([a-z\-]{1,})' );

Route::get( 'news', 'NewsController@index' );

Route::get( 'news/{alias}', 'NewsController@show' )
    ->where( 'alias', '([a-z\-]{1,})' );

Route::get( 'collections', 'CollectionController@index' );

Route::get( 'collections/{alias}', 'CollectionController@show' )
    ->where( 'alias', '([a-z\-]{1,})' );

Route::get('contacts', function()
{
	return View::make('contacts');
});

Route::get( 'photogalleries', 'PhotogalleryController@index' );

Route::get( 'photogalleries/{alias}', 'PhotogalleryController@show' )
    ->where( 'alias', '([a-z\-]{1,})' );

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