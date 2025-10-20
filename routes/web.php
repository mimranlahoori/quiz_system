<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ResultsController;
use App\Http\Controllers\UserAnswerController;
use App\Http\Controllers\UserQuizAttemptController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    // Quiz Routes
    Route::resource('quizzes', QuizController::class);

    // Category Routes
    Route::resource('categories', CategoryController::class);
    // routes/web.php
    Route::delete('/categories/{category}/detach/{quiz}', [CategoryController::class, 'detachQuiz'])
        ->name('categories.detachQuiz');


    // Question Routes

    Route::prefix('questions')->name('questions.')->group(function () {
        Route::get('/', [QuestionController::class, 'index'])->name('index');
        Route::get('/create/{quiz}', [QuestionController::class, 'create'])->name('create');
        Route::post('/store/{quiz}', [QuestionController::class, 'store'])->name('store');
        Route::get('/edit/{question}', [QuestionController::class, 'edit'])->name('edit');
        Route::put('/update/{question}', [QuestionController::class, 'update'])->name('update');
        Route::delete('/destroy/{question}', [QuestionController::class, 'destroy'])->name('destroy');

    });

    // User Quiz Attempt Routes
    Route::prefix('attempts')->name('attempts.')->group(function () {
        Route::get('/', [UserQuizAttemptController::class, 'index'])->name('index');
        Route::get('/start/{quiz}', [UserQuizAttemptController::class, 'start'])->name('start');
        Route::post('/answer/{attempt}/{question}', [UserQuizAttemptController::class, 'answer'])->name('answer');
        Route::get('/next/{attempt}', [UserQuizAttemptController::class, 'next'])->name('next');
    });

    Route::get('/results', [ResultsController::class, 'index'])->name('results.index');
    Route::get('/results/{attempt}', [ResultsController::class, 'show'])->name('results.show');


    Route::get('/certificates', [CertificateController::class, 'index'])->name('certificates.index');
    Route::get('/certificate/{attempt}', [CertificateController::class, 'generate'])->name('certificate.generate');


    // User Answers (admin view only)
    Route::resource('user-answers', UserAnswerController::class)->only(['index', 'show', 'destroy']);
    Route::resource('results', ResultsController::class);



});

require __DIR__ . '/auth.php';
