<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use App\Models\Rendeles;

// Diagramok adatai az adatbázisból, a megjelenítés Chart.js-sel (https://www.chartjs.org/)
class DiagramController extends Controller
{
    public function index()
    {
        // 1. diagram: rendelések száma havonta (rendeles tábla)
        $havi = Rendeles::selectRaw('SUBSTR(felvetel, 1, 7) as honap, COUNT(*) as db')
            ->groupBy('honap')
            ->orderBy('honap')
            ->get();

        // 2. diagram: eladott pizzák darabszáma kategóriánként (pizza + kategoria + rendeles tábla, ORM kapcsolatokkal)
        $kategoriankent = Pizza::with('kategoria')
            ->withSum('rendelesek', 'darab')
            ->get()
            ->groupBy('kategorianev')
            ->map(fn ($pizzak) => (int) $pizzak->sum('rendelesek_sum_darab'));

        // 3. diagram: a 10 legnépszerűbb pizza
        $top10 = Pizza::withSum('rendelesek', 'darab')
            ->orderByDesc('rendelesek_sum_darab')
            ->take(10)
            ->get();

        return view('diagram', [
            'haviCimkek' => $havi->pluck('honap')->map(fn ($h) => str_replace('-', '.', $h)),
            'haviAdatok' => $havi->pluck('db'),
            'katCimkek' => $kategoriankent->keys(),
            'katAdatok' => $kategoriankent->values(),
            'topCimkek' => $top10->pluck('nev'),
            'topAdatok' => $top10->pluck('rendelesek_sum_darab')->map(fn ($x) => (int) $x),
        ]);
    }
}
