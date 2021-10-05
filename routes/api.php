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


//TODO: refactor
Route::get('/work/getTable/statuses', [\App\Http\Controllers\StatusesController::class, 'getByAPI']);
Route::get('/work/getTable/levels', [\App\Http\Controllers\LevelsController::class, 'getByAPI']);
Route::get('/work/getTable/vacancies', [\App\Http\Controllers\VacanciesController::class, 'getByAPI']);
Route::get('/work/getTable/resumes', [\App\Http\Controllers\ResumesController::class, 'getByAPI']);

Route::post('/work/addInTable/resumes', [\App\Http\Controllers\ResumesController::class, 'addByAPI']);
Route::post('/work/addInTable/levels', [\App\Http\Controllers\ResumesController::class, 'addByAPI']);
Route::post('/work/addInTable/resumes', [\App\Http\Controllers\ResumesController::class, 'addByAPI']);
Route::post('/work/addInTable/resumes', [\App\Http\Controllers\ResumesController::class, 'addByAPI']);
