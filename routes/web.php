<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanningController;

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
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/Q&A', function () {
    return view('Q&A');
})->name('Q&A');

Route::middleware(['auth:sanctum', 'verified'])->get('/planning', [PlanningController::class, 'index']);
Route::middleware(['auth:sanctum', 'verified'])->get('/planning/appointment/{id}', [PlanningController::class, 'show']);
