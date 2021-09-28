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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['cors', 'json.response']], function () {
    Route::post('/login', 'Auth\ApiAuthController@login')->name('login.api');
    Route::post('/register', 'Auth\ApiAuthController@register')->name('login.api');



    //  Route::post('/register','App\Http\Controllers\Auth\ApiAuthController@register')->name('register.api');
  //  Route::post('/register', 'AccountController@CreateOrEditUser')->name('listusers.api');

    Route::post('/listusers', 'AccountController@listusers')->name('listusers.api')->middleware('auth:api')->middleware( 'api.user');;

    Route::post('/createcontent', 'ContentController@createcontent')->name('createcontent.api')->middleware('auth:api')->middleware( 'api.user');;


    Route::post('/accessdenied', 'AccountController@accessdenied')->name('accessdenied.api');

    Route::post('/userdeactivated', 'AccountController@userdeactivated')->name('userdeactivated.api');


  //



});
