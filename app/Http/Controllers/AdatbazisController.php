<?php

namespace App\Http\Controllers;

use App\Models\Kategoria;
use App\Models\Pizza;
use App\Models\Rendeles;

// Forrás: Megoldasok.zip / 03b-ORM / ControllerModel.php és ControllerRelationship.php
// Mindhárom tábla adatait ORM-mel (Eloquent) olvassuk.
class AdatbazisController extends Controller
{
    public function index()
    {
        // kategoria tábla + hány pizza tartozik bele (hasMany)
        $kategoriak = Kategoria::withCount('pizzak')->orderBy('ar')->get();

        // pizza tábla + kategória ára (belongsTo) + eladott darabszám (rendeles tábla, hasMany)
        $pizzak = Pizza::with('kategoria')
            ->withSum('rendelesek', 'darab')
            ->orderBy('nev')
            ->get();

        // rendeles tábla: a 10 legutolsó rendelés
        $rendelesek = Rendeles::with('pizza.kategoria')
            ->orderByDesc('felvetel')
            ->take(10)
            ->get();

        return view('adatbazis', compact('kategoriak', 'pizzak', 'rendelesek'));
    }
}
