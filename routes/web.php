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

//Route::get('/pdf', [\App\Http\Controllers\ResumesController::class, 'indexPDF']);



Route::patch('/resumes/status', [\App\Http\Controllers\ResumesController::class, 'statusUpdate']);
Route::patch('/resumes/interview', [\App\Http\Controllers\ResumesController::class, 'interviewUpdate']);
Route::get('/resumes/pdf/{id}', [\App\Http\Controllers\ResumesController::class, 'createPDF']);

Route::resource('resumes','ResumesController');



Route::resource('levels','LevelsController');
Route::resource('statuses','StatusesController');
Route::resource('vacancies','VacanciesController');

// костыльный сидер сделать адекватно
Route::get('spravka', [\App\Http\Controllers\ResumesController::class, 'seeder']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
