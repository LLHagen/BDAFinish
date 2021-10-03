<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('resumes','ResumesController');


// костыльный сидер сделать адекватно
Route::get('spravka', [\App\Http\Controllers\ResumesController::class, 'seeder']);

Route::group(['prefix'=>'levels'], function(){
    Route::get('/', [\App\Http\Controllers\LevelsController::class, 'create']);
    Route::post('/', [\App\Http\Controllers\LevelsController::class, 'store']);
    Route::patch('/{id}', [\App\Http\Controllers\LevelsController::class, 'update']);
    Route::delete('/{id}', [\App\Http\Controllers\LevelsController::class, 'destroy']);
    Route::get('/{id}/edit', [\App\Http\Controllers\LevelsController::class, 'edit']);
});

Route::group(['prefix'=>'statuses'], function(){
    Route::get('/', [\App\Http\Controllers\StatusesController::class, 'create']);
    Route::post('', [\App\Http\Controllers\StatusesController::class, 'store']);
    Route::patch('/{id}', [\App\Http\Controllers\StatusesController::class, 'update']);
    Route::delete('/{id}', [\App\Http\Controllers\StatusesController::class, 'destroy']);
    Route::get('/{id}/edit', [\App\Http\Controllers\StatusesController::class, 'edit']);
});

Route::group(['prefix'=>'vacancies'], function(){
    Route::get('/', [\App\Http\Controllers\VacanciesController::class, 'create']);
    Route::post('', [\App\Http\Controllers\VacanciesController::class, 'store']);
    Route::patch('/{id}', [\App\Http\Controllers\VacanciesController::class, 'update']);
    Route::delete('/{id}', [\App\Http\Controllers\VacanciesController::class, 'destroy']);
    Route::get('/{id}/edit', [\App\Http\Controllers\VacanciesController::class, 'edit']);
});
