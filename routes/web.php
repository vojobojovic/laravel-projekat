<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProizvodController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Početna stranica (istaknuti proizvodi)
Route::get('/home', [ProizvodController::class, 'home'])->name('home');

// Katalog proizvoda sa filtriranjem
Route::get('/katalog', [ProizvodController::class, 'index'])->name('katalog');

// Detaljan prikaz pojedinačnog proizvoda
Route::get('/proizvod/{id}', [ProizvodController::class, 'show'])->name('proizvod.show');

// Kontakt stranica
Route::get('/kontakt', function () {
    return view('kontakt');
})->name('kontakt');

// Dashboard ruta (može prikazivati različito u zavisnosti od uloge)
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

// Rute za korisnike (admin panel)
Route::resource('users', UserController::class)->middleware('auth')->names('users');

// Rute za proizvode (editor panel) — koristi resource
//Route::resource('proizvods', ProizvodController::class)->middleware('auth')->names('proizvods');
Route::resource('proizvods', ProizvodController::class)->middleware('auth')->names('proizvodi');


// Dodatna ruta za dashboard proizvoda za editore/admina
Route::get('/admin/editor-dashboard', [ProizvodController::class, 'indexAdminEditor'])
    ->middleware('auth')
    ->name('proizvods.dashboard');

// Logout ruta (Breeze)
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Profile rute (Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Učitaj Breeze auth rute
require __DIR__.'/auth.php';
