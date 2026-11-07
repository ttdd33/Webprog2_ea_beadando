<?php

namespace App\Http\Controllers;

use App\Models\Uzenet;
use Illuminate\Http\Request;

// Forrás: Megoldasok.zip / 01-02-Laravel alap-feladatok / ControllerForm5.php (szerver oldali validáció)
// Módosítás: magyar hibaüzenetek, és a validált adatokat ORM-mel elmentjük az uzenetek táblába.
class KapcsolatController extends Controller
{
    public function create()
    {
        return view('kapcsolat');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nev' => 'required|string|min:3|max:100',
            'email' => 'required|email|max:150',
            'targy' => 'required|string|max:150',
            'uzenet' => 'required|string|min:10|max:2000',
        ], [
            'nev.required' => 'A név megadása kötelező.',
            'nev.min' => 'A név legalább 3 karakter legyen.',
            'email.required' => 'Az e-mail cím megadása kötelező.',
            'email.email' => 'Érvényes e-mail címet adjon meg.',
            'targy.required' => 'A tárgy megadása kötelező.',
            'uzenet.required' => 'Az üzenet nem lehet üres.',
            'uzenet.min' => 'Az üzenet legalább 10 karakter legyen.',
        ]);

        Uzenet::create($validated);

        return redirect('/kapcsolat')->with('success', 'Köszönjük! Üzenetét elmentettük.');
    }
}
