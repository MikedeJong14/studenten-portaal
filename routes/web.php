<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\DocentController;
use App\Http\Controllers\PlanningController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\livewire\Questions;
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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::prefix('/gebruiker')->group(function () {
        Route::get('/registreren', [UserController::class, 'create'])->name('user/register');
        Route::post('/registreren', [UserController::class, 'store'])->name('user/store');
    });
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/stel-een-vraag', [QuestionController::class, 'index'])->name('question/index');
    Route::get('/vraag/nieuw', [QuestionController::class, 'create'])->name('question/create');
    Route::post('/vraag/opslaan', [QuestionController::class, 'store'])->name('question/store');
    Route::get('/vraag/bewerken/{id}', [QuestionController::class, 'edit'])->name('question/edit');
    Route::post('/vraag/updaten/{id}', [QuestionController::class, 'update'])->name('question/update');
    Route::get('/vraag/verwijderen/{id}', [QuestionController::class, 'destroy'])->name('question/delete');

    Route::get('/vraag/{questionId}/antwoord/nieuw', [AnswerController::class, 'create'])->name('answer/create');
    Route::post('/vraag/{questionId}/antwoord/opslaan', [AnswerController::class, 'store'])->name('answer/store');
    //Route::get('/antwoord/bewerken/{id}', [AnswerController::class, 'edit'])->name('answer/edit');
    //Route::post('/antwoord/updaten/{id}', [AnswerController::class, 'update'])->name('answer/update');
    //Route::get('/antwoord/verwijderen/{id}', [AnswerController::class, 'destroy'])->name('answer/delete');

    Route::get('/planning', [PlanningController::class, 'index'])->name('planning/index');
    Route::get('/planning/afspraak/{id}', [PlanningController::class, 'show'])->name('planning/show');
    Route::get('/planning/kalender', [PlanningController::class, 'create'])->name('planning/create');
    Route::get('/planning/kalender/navigeer/{ym}', [PlanningController::class, 'navigate'])->name('planning/create/navigate');
    Route::get('/planning/kalender/{date}', [PlanningController::class, 'createAppointment'])->name('planning/create_appointment');
    Route::post('/planning/opslaan', [PlanningController::class, 'store'])->name('planning/store');
    Route::get('/planning/afspraak/bewerken/{id}', [PlanningController::class, 'edit'])->name('planning/edit');
    Route::post('/planning/afspraak/updaten/{id}', [PlanningController::class, 'update'])->name('planning/update');
    Route::get('/planning/afspraak/verwijderen/{id}', [PlanningController::class, 'delete'])->name('planning/delete');
    Route::post('/planning/afspraak/vernietigen/{id}', [PlanningController::class, 'destroy'])->name('planning/destroy');
});

Route::middleware(['auth:sanctum', 'verified', 'admin'])->group(function () {
    Route::get('/docent', [DocentController::class, 'index'])->name('docent');
    Route::get('/docent/vragen', [DocentController::class, 'vragen'])->name('docent/vragen');
    Route::get('/docent/gesprekken', [DocentController::class, 'gesprekken'])->name('docent/gesprekken');
    Route::get('/docent/gesprekken/vervolggesprek/{id}', [DocentController::class, 'create'])->name('docent/create');
    Route::post('/docent/gesprekken/opslaan', [DocentController::class, 'store'])->name('docent/store');
});

Route::post('/zoeken', SearchController::class)->name('search/index');
