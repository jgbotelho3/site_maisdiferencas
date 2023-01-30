<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfileController;
use App\Models\Project;
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

    // Category routes
    Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/categories/new', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/categories/new', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('category.update.show');
    Route::put('/categories/{id}/edit', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/categories/{id}/delete', [CategoryController::class, 'destroy'])->name('category.destroy');

    //Project routes

    Route::get('/projects', [ProjectController::class, 'index'])->name('project.index');
    Route::get('/projects/new', [ProjectController::class, 'create'])->name('project.create');
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
