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
Route::get('employees', 'ApiController@getAllEmployees');
Route::get('employee/{id}', 'ApiController@getEmployee');
Route::post('employees', 'ApiController@createEmployee');
Route::put('employee/update/{id}', 'ApiController@updateEmployee');
Route::delete('employee/delete/{id}','ApiController@deleteEmployee');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
