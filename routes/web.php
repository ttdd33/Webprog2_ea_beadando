<?php

use App\Http\Controllers\AdatbazisController;
use App\Http\Controllers\FooldalController;
use App\Http\Controllers\KapcsolatController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Látogató (nem bejelentkezett) is eléri: Főoldal, Adatbázis, Kapcsolat, Diagram
Route::get('/', [FooldalController::class, 'index'])->name('home');
Route::get('adatbazis', [AdatbazisController::class, 'index']);
Route::get('kapcsolat', [KapcsolatController::class, 'create']);
Route::post('kapcsolat', [KapcsolatController::class, 'store']);

// Forrás: Megoldasok.zip / 07-08-Authentication / web.php – auth middleware csoport
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
