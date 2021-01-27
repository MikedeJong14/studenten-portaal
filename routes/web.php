<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PlanningController;
use App\Http\Controllers\DocentController;
use App\Http\Controllers\QAController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\QuestionController;
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
    return view('home.questions');
})->name('Q&A');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::prefix('/gebruiker')->group(function () {
        Route::get('/registreren', [UserController::class, 'create'])->name('user/register');
        Route::post('/registreren', [UserController::class, 'store'])->name('user/store');
    });
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/docent', [DocentController::class, 'index'])->name('docent');
    Route::get('/docent/vragen', [DocentController::class, 'vragen'])->name('docent/vragen');
    Route::get('/docent/gesprekken', [DocentController::class, 'gesprekken'])->name('docent/gesprekken');

    Route::get('/stel-een-vraag', [QuestionController::class, 'index'])->name('question/index');
    Route::get('/vraag/nieuw', [QuestionController::class, 'create'])->name('question/create');
    Route::post('/vraag/opslaan', [QuestionController::class, 'store'])->name('question/store');
    Route::get('/vraag/bewerken/{id}', [QuestionController::class, 'edit'])->name('question/edit');
    Route::post('/vraag/updaten/{id}', [QuestionController::class, 'update'])->name('question/update');
    Route::get('/vraag/verwijderen/{id}', [QuestionController::class, 'destroy'])->name('question/delete');
});

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
