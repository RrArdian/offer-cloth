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

Route::get('orderlist', function()
{
    $data = [['id' => 2, 'name' => 'Jacket Purple Vintage Temporary', 'brand' => 'Kawanku Clothing', 'qty' => 2, 'price' => '240000', 'size' => 'XL', 'status' => 'Dipesan langsung',
            "photos" => [
                "id" => 2,
                "product_id" => "2",
                "caption" => "Jacket",
                "photo_name" => "jacket_distro.jpg",
                "photo_url" => "assets/sandbox/jacket_distro.jpg"]],
            ['id' => 3, 'name' => 'Hoodie Black Calm Gawl', 'brand' => 'Kawanku Clothing', 'qty' => 2, 'price' => '140000', 'size' => 'M', 'status' => 'Dipesan langsung',
        "photos" => [
            "id" => 12,
            "product_id" => "12",
            "caption" => "Hoodie",
            "photo_name" => "hoodie_distro.jpg",
            "photo_url" => "assets/sandbox/hoodie_distro.jpg"
        ]]];

    return Response::json(['error' => 'false', 'data' => ['cart' => $data, 'items_count' => '4', 'total' => '760000' ]]);
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
    Route::get('activate', ['uses' => 'UserController@activate']);
    Route::get('user/profil', ['uses' => 'UserController@profil']);
    Route::get('cart', ['uses' => 'CartController@index']);
    Route::get('empty/cart', ['uses' => 'CartController@emptycart']);
});