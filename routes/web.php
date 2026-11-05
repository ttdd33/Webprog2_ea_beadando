<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Látogató (nem bejelentkezett) is eléri: Főoldal, Adatbázis, Kapcsolat, Diagram
Route::get('/', function () {
    return view('fooldal');
})->name('home');

// Forrás: Megoldasok.zip / 07-08-Authentication / web.php – auth middleware csoport
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
