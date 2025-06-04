<?php

use App\Http\Controllers\HuisjeController;
use App\Http\Controllers\ProfileController;
use App\Models\Huisje;
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

Route::get('/huisjes/create', [HuisjeController::class, 'create'])->name('huisjes.create');
Route::post('/huisjes', [HuisjeController::class, 'store'])->name('huisjes.store');

Route::get('/huisjes', [HuisjeController::class, 'index'])->name('huisjes.index');
Route::get('/huisjes/{huisje}', [HuisjeController::class, 'show'])->name('huisjes.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
