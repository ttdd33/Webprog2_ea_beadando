<?php

namespace App\Http\Controllers;

use App\Models\Kategoria;
use App\Models\Pizza;
use App\Models\Rendeles;

class FooldalController extends Controller
{
    public function index()
    {
        return view('fooldal', [
            'pizzaDb' => Pizza::count(),
            'kategoriaDb' => Kategoria::count(),
            'rendelesDb' => Rendeles::count(),
        ]);
    }
}
