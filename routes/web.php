<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanningController;
use App\Http\Controllers\DocentController;

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
Route::middleware(['auth:sanctum', 'verified'])->get('/ask-question', function () {
    return view('ask-question');
})->name('ask-question');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/docent', [DocentController::class, 'index'])->name('docent');
    Route::get('/docent/vragen', [DocentController::class, 'vragen'])->name('docent/vragen');
    Route::get('/docent/gesprekken', [DocentController::class, 'gesprekken'])->name('docent/gesprekken');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/planning', [PlanningController::class, 'index']);
Route::middleware(['auth:sanctum', 'verified'])->get('/planning/appointment/{id}', [PlanningController::class, 'show']);
