<?php

use App\Http\Controllers\accommodatieController;
use App\Http\Controllers\ProfileController;
use App\Models\accommodatie;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/results', function () {
    return view('accommodaties.results');
})->name('accommodaties.results');

// Route met auth middleware
Route::middleware('auth')->group(function () {
    Route::get('accommodaties/boeken', function () {
        return view('accommodaties.boeken');
    });

    Route::get('/accommodaties/create', [accommodatieController::class, 'create'])->name('accommodaties.create');
    Route::post('/accommodaties', [accommodatieController::class, 'store'])->name('accommodaties.store');
    Route::get('/accommodaties/{accommodatie}/edit', [accommodatieController::class, 'edit'])->name('accommodaties.edit');
    Route::put('/accommodaties/{accommodatie}', [accommodatieController::class, 'update'])->name('accommodaties.update');
    Route::post('/accommodaties/{accommodatie}/beschikbaarheid', [AccommodatieController::class, 'beschikbaarheidToevoegen'])->name('accommodaties.beschikbaarheid.toevoegen');
    Route::delete('/accommodaties/beschikbaarheid/{id}', [AccommodatieController::class, 'beschikbaarheidVerwijderen'])->name('accommodaties.beschikbaarheid.verwijderen');
});

// Publieke accommodatie-routes
Route::get('/accommodaties', [accommodatieController::class, 'index'])->name('accommodaties.index');
Route::get('/accommodaties/{accommodatie}', [accommodatieController::class, 'show'])->name('accommodaties.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
