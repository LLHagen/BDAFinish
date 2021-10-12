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
Route::get('/work/getTable/statuses', [\App\Http\Controllers\StatusesController::class, 'get']);
Route::get('/work/getTable/levels', [\App\Http\Controllers\LevelsController::class, 'get']);
Route::get('/work/getTable/vacancies', [\App\Http\Controllers\VacanciesController::class, 'get']);
Route::get('/work/getTable/resumes', [\App\Http\Controllers\ResumesController::class, 'get']);

Route::post('/work/addInTable/statuses', [\App\Http\Controllers\StatusesController::class, 'addByAPI']);
Route::post('/work/addInTable/levels', [\App\Http\Controllers\LevelsController::class, 'addByAPI']);
Route::post('/work/addInTable/vacancies', [\App\Http\Controllers\VacanciesController::class, 'addByAPI']);
Route::post('/work/addInTable/resumes', [\App\Http\Controllers\ResumesController::class, 'addByAPI']);

Route::put('/work/editRecordInTable/statuses', [\App\Http\Controllers\StatusesController::class, 'editByAPI']);
Route::put('/work/editRecordInTable/levels', [\App\Http\Controllers\LevelsController::class, 'editByAPI']);
Route::put('/work/editRecordInTable/vacancies', [\App\Http\Controllers\VacanciesController::class, 'editByAPI']);
Route::put('/work/editRecordInTable/resumes', [\App\Http\Controllers\ResumesController::class, 'editByAPI']);

Route::delete('/work/delRecordInTable/statuses', [\App\Http\Controllers\StatusesController::class, 'delByAPI']);
Route::delete('/work/delRecordInTable/levels', [\App\Http\Controllers\LevelsController::class, 'delByAPI']);
Route::delete('/work/delRecordInTable/vacancies', [\App\Http\Controllers\VacanciesController::class, 'delByAPI']);
Route::delete('/work/delRecordInTable/resumes', [\App\Http\Controllers\ResumesController::class, 'delByAPI']);
