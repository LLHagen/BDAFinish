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


Route::get('test', [\App\Http\Controllers\ResumesController::class, 'test']);

// костыльный сидер сделать адекватно
Route::get('spravka', [\App\Http\Controllers\ResumesController::class, 'seeder']);
