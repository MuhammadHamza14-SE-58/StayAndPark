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
Route::group(['middleware' => 'api'],function () {

    Route::get("/login","api_controller@login");
    Route::get("/register","api_controller@register");
    Route::get("/data","api_controller@data");
    Route::get("/dataID/{id}","api_controller@dataID");
    Route::get("/search/{text}","api_controller@search");
//    Route::get("/search/{type}/{text}","api_controller@search");

});
//Route::get('/users',function (Request $request){
//
//    return['name'=>'hamza','names'=>'hamza','nameA'=>'hamza'];
//
//})
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

