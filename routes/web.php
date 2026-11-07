<?php

use App\Http\Controllers\AdatbazisController;
use App\Http\Controllers\DiagramController;
use App\Http\Controllers\FooldalController;
use App\Http\Controllers\KapcsolatController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\UzenetController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Látogató (nem bejelentkezett) is eléri: Főoldal, Adatbázis, Kapcsolat, Diagram
Route::get('/', [FooldalController::class, 'index'])->name('home');
Route::get('adatbazis', [AdatbazisController::class, 'index']);
Route::get('kapcsolat', [KapcsolatController::class, 'create']);
Route::post('kapcsolat', [KapcsolatController::class, 'store']);
Route::get('diagram', [DiagramController::class, 'index']);

// Forrás: Megoldasok.zip / 07-08-Authentication / web.php – auth middleware csoport
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');

    // Regisztrált látogató: Üzenetek menü
    Route::get('uzenetek', [UzenetController::class, 'index']);

    // Admin: CRUD menü (Forrás: 05-06-CRUD alkalmazás / web.php – Route::resource)
    Route::resource('pizzak', PizzaController::class)
        ->parameters(['pizzak' => 'pizza'])
        ->except(['show'])
        ->middleware('admin');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
