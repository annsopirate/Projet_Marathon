<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\Controller;

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

Route::get('/',[\App\Http\Controllers\HomeController::class,'accueil'])->name('accueil');
Route::get('/liste',[\App\Http\Controllers\SeriesController::class,'listeSerie'])->name('liste');
Route::get('/series/{id}',[\App\Http\Controllers\SeriesController::class,'detailSerie'])->name('detailserie');
Route::get('/profile',[\App\Http\Controllers\UserController::class,'user'])->name('profile');
Route::post('/comments', [\App\Http\Controllers\SeriesController::class,'commenter'])->middleware('auth');

Route::post('/vu/episode/{id}', [\App\Http\Controllers\SeriesController::class,'episodeVu'])->middleware('auth');