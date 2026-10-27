<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\QuestionController;
use App\Http\Middleware\EnsureTeamMembership;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('home');

// Ruta para mostrar el formulario
Route::get('Foro/Crear', [QuestionController::class, 'create'])->name('questions.create')->middleware('auth');

// ➕ AGREGA ESTA LÍNEA (Ruta para procesar y guardar el formulario)
Route::post('Foro', [QuestionController::class, 'store'])->name('questions.store')->middleware('auth');

Route::get('Foro', [QuestionController::class, 'index'])->name('questions.index');

Route::get('Foro/{question:slug}/editar', [QuestionController::class, 'edit'])->name('questions.edit')->middleware('auth');
Route::put('Foro/{question:slug}', [QuestionController::class, 'update'])
->name('questions.update')
->middleware('auth', 'can:update,question');

Route::get('Foro/{question:slug}', [QuestionController::class, 'show'])->name('questions.show');

Route::post('Respuesta/{question}', [AnswerController::class, 'store'])->name('answer.store')->middleware('auth');
Route::delete('Foro/{question}', [QuestionController::class, 'destroy'])->name('questions.destroy')->middleware('auth','can:delete,question');

Route::prefix('{current_team}')
    ->middleware(['auth', 'verified', EnsureTeamMembership::class])
    ->group(function () {
        Route::view('dashboard', 'dashboard')->name('dashboard');
    });

require __DIR__.'/settings.php';
