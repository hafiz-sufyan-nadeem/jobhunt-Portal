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
        Route::get('/edit/{id}', [EmployerController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [EmployerController::class, 'update'])->name('update');
    });



require __DIR__.'/auth.php';
