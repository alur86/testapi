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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
 //   return $request->user();
//});



Route::group(['prefix' =>'v1/api/', 'namespace' => 'API'], function () { 

Route::resource('documents', 'DocumentsController');
Route::post('/documents/{id}/publish','DocumentsController@publish');
Route::patch('/documents/{id}/patched','DocumentsController@patched');

});