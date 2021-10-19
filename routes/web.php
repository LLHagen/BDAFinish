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
    if( isset($_GET['react']) ){
        return view('layouts.react');
    } else return redirect(\route('resumes.index'));
});

//Route::get('/pdf', [\App\Http\Controllers\ResumesController::class, 'indexPDF']);

Route::get('/resumes/pdf/{id}', [\App\Http\Controllers\ResumesController::class, 'createPDF']);

Route::get('/resumes', [\App\Http\Controllers\ResumesController::class, 'index'])->middleware(['auth.resume']);

Route::group(['middleware' => ['auth']], function() {

    Route::patch('/resumes/status', [\App\Http\Controllers\ResumesController::class, 'statusUpdate']);
    Route::patch('/resumes/interview', [\App\Http\Controllers\ResumesController::class, 'interviewUpdate']);

    Route::resource('resumes','ResumesController');

    Route::resource('levels','LevelsController');
    Route::resource('statuses','StatusesController');
    Route::resource('vacancies','VacanciesController');

});

Route::post('/resumes', [\App\Http\Controllers\ResumesController::class, 'store']);
Route::get('/resumes/create', [\App\Http\Controllers\ResumesController::class, 'create']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
