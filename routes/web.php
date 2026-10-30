<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnnoncesController;
use App\Http\Controllers\ReservationsController;

/**
 * Routes publiques
 */

// Pages statiques
Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::post('/contact', [PagesController::class, 'sendContact'])->name('contact.send');

// Authentification
Route::get('/auth/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/auth/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/auth/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/auth/register', [AuthController::class, 'register'])->name('register.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Annonces (lecture)
Route::get('/services', [AnnoncesController::class, 'index'])->name('annonces.index');
Route::get('/annonces/{id}', [AnnoncesController::class, 'show'])->name('annonces.show');

/**
 * Routes protégées (nécessitent authentification)
 */

// Annonces (création, modification, suppression)
Route::middleware(['auth'])->group(function () {
    Route::get('/annonces/create', [AnnoncesController::class, 'create'])->name('annonces.create');
    Route::post('/annonces', [AnnoncesController::class, 'store'])->name('annonces.store');
    Route::get('/annonces/{id}/edit', [AnnoncesController::class, 'edit'])->name('annonces.edit');
    Route::put('/annonces/{id}', [AnnoncesController::class, 'update'])->name('annonces.update');
    Route::delete('/annonces/{id}', [AnnoncesController::class, 'destroy'])->name('annonces.destroy');

    // Réservations
    Route::get('/reservations', [ReservationsController::class, 'index'])->name('reservations.index');
    Route::get('/reserver/{annonce_id}', [ReservationsController::class, 'create'])->name('reservations.create');
    Route::post('/reservations', [ReservationsController::class, 'store'])->name('reservations.store');
    Route::get('/reservations/{id}/edit', [ReservationsController::class, 'edit'])->name('reservations.edit');
    Route::put('/reservations/{id}', [ReservationsController::class, 'update'])->name('reservations.update');
    Route::delete('/reservations/{id}', [ReservationsController::class, 'destroy'])->name('reservations.destroy');

    // Dashboard vendeur
    Route::get('/dashboard', [PagesController::class, 'vendorDashboard'])->name('dashboard');
});
