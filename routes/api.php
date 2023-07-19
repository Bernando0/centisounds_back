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

Route::get('genre/{id}', [\App\Http\Controllers\GenreController::class, 'get']);
Route::get('genres', [\App\Http\Controllers\GenreController::class, 'list']);
Route::post('genre', [\App\Http\Controllers\GenreController::class, 'create']);
Route::put('genre/{id}', [\App\Http\Controllers\GenreController::class, 'update']);
Route::delete('genre/{id}', [\App\Http\Controllers\GenreController::class, 'delete']);

Route::get('file/{id}', [\App\Http\Controllers\FileController::class, 'get']);
Route::get('files', [\App\Http\Controllers\FileController::class, 'list']);
Route::post('file', [\App\Http\Controllers\FileController::class, 'create']);
Route::put('file/{id}', [\App\Http\Controllers\FileController::class, 'update']);
Route::delete('file/{id}', [\App\Http\Controllers\FileController::class, 'delete']);

Route::get('sound/{id}', [\App\Http\Controllers\SoundController::class, 'get']);
Route::get('music', [\App\Http\Controllers\SoundController::class, 'musiclist']);
Route::get('musicsix', [\App\Http\Controllers\SoundController::class, 'musiclistsix']);
Route::get('sounds', [\App\Http\Controllers\SoundController::class, 'list']);
Route::get('beats', [\App\Http\Controllers\SoundController::class, 'beatslist']);
Route::get('samples', [\App\Http\Controllers\SoundController::class, 'sampleslist']);
Route::post('sound', [\App\Http\Controllers\SoundController::class, 'create']);
Route::put('sound/{id}', [\App\Http\Controllers\SoundController::class, 'update']);
Route::delete('sound/{id}', [\App\Http\Controllers\SoundController::class, 'delete']);

