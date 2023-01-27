<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    return Inertia::render('Welcome');
});

// Route::redirect('/', '/dashboard');

Route::prefix('dashboard')->group(function (){
    Route::get('/', function(){
        return Inertia::render('Dashboard/Home');
    });
    
    Route::get('/users', function(){
        return Inertia::render('Dashboard/Users');
    });

    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categories/new', [CategoryController::class, 'create']);
});

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
// require __DIR__.'/category.php';
