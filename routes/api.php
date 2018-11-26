<?php

use Illuminate\Http\Request;
Use App\Product;
Use App\Category;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'auth:api'], function() {
    Route::get('product', 'ProductController@index');
    Route::get('product/{product}', 'ProductController@show');
    Route::post('product', 'ProductController@store');
    Route::put('product/{product}', 'ProductController@update');
    Route::delete('product/{product}', 'ProductController@delete');
});