<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResultController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/quiz', [QuestionController::class, 'index'])
    ->middleware('auth');

Route::post('/quiz', [QuestionController::class, 'submit'])
    ->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/results', function () {

    if (!Auth::user()->is_admin) {

        return redirect('/dashboard')
            ->with('error', 'Користувач не має доступу до цієї сторінки');

    }

    return app(\App\Http\Controllers\ResultController::class)->index();

})->middleware(['auth'])->name('results');

require __DIR__ . '/auth.php';
