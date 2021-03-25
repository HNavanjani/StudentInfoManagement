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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/student','StudentController@store');
Route::get('/student/{student}','StudentController@show');
Route::get('/student/{student}/marks','StudentController@show_marks');
Route::get('/students','StudentController@index');
Route::get('/winners', 'StudentController@get_best_students');


Route::post('/subject','SubjectController@store');
Route::get('/subject/{subject}','SubjectController@show');
// Route::get('subject/{subject}/marks','SubjectController@show_marks');
Route::get('/subjects','SubjectController@index');

Route::post('/student/mark','MarkController@store');
Route::get('/marks','MarkController@index');
Route::get('/mark/{mark}', 'MarkController@show');
// Route::get('winners', 'MarkController@get_best_students');
