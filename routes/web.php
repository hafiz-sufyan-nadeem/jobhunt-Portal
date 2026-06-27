<?php

use App\Http\Controllers\EmployerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:employer'])
    ->prefix('employer')
    ->name('employer.')
    ->group(function (){
        Route::get('/index', [EmployerController::class, 'index'])->name('index');
        Route::get('/create', [EmployerController::class, 'create'])->name('create');
        Route::post('/store', [EmployerController::class, 'store'])->name('store');
        Route::get('/edit/{employer}', [EmployerController::class, 'edit'])->name('edit');
        Route::patch('/update/{employer}', [EmployerController::class, 'update'])->name('update');
    });

Route::middleware(['auth', 'role:employer'])
    ->prefix('jobs')
    ->name('jobs.')
    ->group(function (){
        Route::get('/index', [\App\Http\Controllers\JobListingController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\JobListingController::class, 'create'])->name('create');
        Route::post('/store', [\App\Http\Controllers\JobListingController::class, 'store'])->name('store');
        Route::get('/edit/{job}', [\App\Http\Controllers\JobListingController::class, 'edit'])->name('edit');
        Route::patch('/update/{job}', [\App\Http\Controllers\JobListingController::class, 'update'])->name('update');
        Route::delete('destroy/{job}', [\App\Http\Controllers\JobListingController::class, 'destroy'])->name('destroy');
    });


Route::middleware(['auth', 'role:candidate'])
    ->prefix('candidate')
    ->name('candidate.')
    ->group(function (){
        Route::get('/index', [\App\Http\Controllers\CandidateController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\CandidateController::class, 'create'])->name('create');
        Route::post('/store', [\App\Http\Controllers\CandidateController::class, 'store'])->name('store');
        Route::get('/edit/{candidate}', [\App\Http\Controllers\CandidateController::class, 'edit'])->name('edit');
        Route::patch('/update/{candidate}', [\App\Http\Controllers\CandidateController::class, 'update'])->name('update');
        Route::delete('destroy/{candidate}', [\App\Http\Controllers\CandidateController::class, 'destroy'])->name('destroy');
    });


require __DIR__.'/auth.php';
