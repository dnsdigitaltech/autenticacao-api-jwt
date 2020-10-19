<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
/*
Route::get('/categories', 'Api\CategoryController@index');
Route::post('/categories', 'Api\CategoryController@store');
Route::put('/categories/{id}', 'Api\CategoryController@update');
Route::delete('/categories/{id}', 'Api\CategoryController@destroy');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::post('auth', 'Auth\AuthApiController@authenticate');
Route::post('auth-refresh', 'Auth\AuthApiController@refreshToken');
Route::get('me', 'Auth\AuthApiController@getAuthenticatedUser');

Route::group([
    'prefix' => 'v1', 
    'namespace' => 'Api\v1', 
    'middleware' => 'auth:api'],
    function(){    
    Route::get('categories/{id}/products', 'CategoryController@products');
    Route::apiResource('categories', 'CategoryController');
    Route::apiResource('products', 'ProductController');
});