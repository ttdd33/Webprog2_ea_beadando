<?php

use App\Http\Controllers\AdatbazisController;
use App\Http\Controllers\DiagramController;
use App\Http\Controllers\FooldalController;
use App\Http\Controllers\KapcsolatController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\UzenetController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
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

// Forrás: Web-programozas-2-Előadás.pdf – "Laravel feltöltése web-szerverre", B, Artisan::call
// A tárhelyen böngészőből futtatja a migrációt és a seedinget: /run-migrations?kulcs=...
// Módosítás: csak a .env fájlban megadott MIGRATE_KEY kulccsal fut, így más nem tudja törölni az adatbázist.
Route::get('run-migrations', function (Request $request) {
    $kulcs = config('app.migrate_key');
    abort_unless($kulcs && $request->query('kulcs') === $kulcs, 403);
    Artisan::call('migrate:fresh', ['--seed' => true, '--force' => true]);
    return '<pre>'.e(Artisan::output()).'</pre>';
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
