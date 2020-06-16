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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');

Route::get('/event', 'EventController@index');
Route::post('/add/event', 'EventController@store');
Route::get('/event/data', 'EventController@getEventCompany');

Route::get('/company', 'CompanyController@getCompany');
Route::get('/company/data', 'CompanyController@getCompanyWorker');

Route::get('/employee', 'EmployeeController@getEmployee');
Route::get('/employee/data', 'EmployeeController@getEmployeeWork');