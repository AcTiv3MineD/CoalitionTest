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

Route::group( ['namespace' => 'Api' ], function( ) {
	Route::group( [ 'prefix' => '/v1', 'namespace' => 'V1' ], function ( ) {	
        Route::group( [ 'prefix' => '/products', 'namespace' => 'Products' ], function( ) {
            Route::post( '/', 'MainController@create' );
            Route::post( '/filter', 'MainController@filter' );
            Route::put( '/', 'MainController@update' );
        } );
    } );
} );