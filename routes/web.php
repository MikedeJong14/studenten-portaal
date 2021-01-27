<?php

use App\Http\Controllers\PlanningController;
use App\Http\Controllers\QAController;
use App\Http\Controllers\SearchController;
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
    return view('home.index');
})->name('home');
Route::get('/Q&A', function () {
    return view('Q&A');
})->name('Q&A');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/Q&A', [QAController::class, 'guest']);
Route::middleware(['auth:sanctum', 'verified'])->get('/deleteQuestion/{id}', [QAController::class, 'delete']);
Route::middleware(['auth:sanctum', 'verified'])->get('/createQuestion', [QAController::class, 'create']);
Route::middleware(['auth:sanctum', 'verified'])->get('/updateQuestion/{id}', [QAController::class, 'update']);
Route::middleware(['auth:sanctum', 'verified'])->post('/upQuestion/{id}', [QAController::class, 'updateQuestion']);
Route::middleware(['auth:sanctum', 'verified'])->get('/ask-question', [QAController::class, 'askQuestion']);
Route::middleware(['auth:sanctum', 'verified'])->post('/submitQuestion', [QAController::class, 'submitQuestion']);
Route::middleware(['auth:sanctum', 'verified'])->get('/planning', [PlanningController::class, 'index']);
Route::middleware(['auth:sanctum', 'verified'])->get('/planning/appointment/{id}', [PlanningController::class, 'show']);
Route::post('/zoeken', SearchController::class)->name('search/index');
