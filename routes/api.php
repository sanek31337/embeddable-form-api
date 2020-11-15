<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use AvtoDev\JsonRpc\RpcRouter;

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

//Route::post('/formData', function(Request $request, \App\Http\Controllers\EmbeddableFormController $controller){
//    return $controller->handle($request);
//});

RpcRouter::on('addFormData', '\App\Http\Controllers\JsonRpcController@addFormData');
RpcRouter::on('getFormDataByPageUid', '\App\Http\Controllers\JsonRpcController@getFormDataByPageUid');

Route::post('/rpc', 'AvtoDev\\JsonRpc\\Http\\Controllers\\RpcController');
