<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

// Forrás: Megoldasok.zip / 07-08-Authentication / AdminController.php
// A tanári megoldás az AdminController-ben vizsgálta a role==1 feltételt.
// Itt ugyanezt middleware-ként valósítjuk meg, így több útvonalra (CRUD) is rá lehet tenni.
class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() && $request->user()->role == 1) {
            return $next($request);
        }

        // Nem admin felhasználó: visszairányítjuk a főoldalra
        return redirect('/')->with('failed', 'Ehhez az oldalhoz csak admin jogosultsággal lehet hozzáférni.');
    }
}
