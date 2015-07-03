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

Route::get('/', function () {
    return view('welcome');
});

Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});

Route::group(['prefix' => 'api/v1/service', 'middleware' => 'client'], function () {
    Route::get('brands', ['uses' => 'BrandController@index']);
    Route::get('brands/{id}', ['uses' => 'BrandController@show']);
    Route::get('search/brands', ['uses' => 'BrandController@search']);
    Route::get('products', ['uses' => 'ProductController@index']);
    Route::get('products/{id}', ['uses' => 'ProductController@show']);
    Route::get('search/products', ['uses' => 'ProductController@search']);
    Route::get('filter/products', ['uses' => 'ProductController@filter']);
    Route::get('categories', ['uses' => 'CategoryController@index']);
    Route::get('categories/{id}', ['uses' => 'CategoryController@show']);
    Route::get('search/categories', ['uses' => 'CategoryController@search']);
});

Route::group(['prefix' => 'api/v1/service', 'middleware' => ['client', 'oauth']], function () {
    Route::post('register', ['uses' => 'UserController@store']);
    Route::post('activate', ['uses' => 'UserController@activate']);
    Route::get('user/profil', ['uses' => 'UserController@profil']);
});