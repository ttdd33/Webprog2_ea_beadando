<?php

namespace App\Http\Controllers;

use App\Models\Kategoria;
use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

// Forrás: Megoldasok.zip / 05-06-CRUD alkalmazás / PersonController.php
// Módosítás: Person helyett Pizza modell, a kategória legördülő listából választható,
// magyar szövegek, és a CRUD csak admin számára érhető el ('admin' middleware a web.php-ban).
class PizzaController extends Controller
{
    public function index()
    {
        $pizzak = Pizza::with('kategoria')->orderBy('nev')->get();
        return view('pizzak.index', compact('pizzak'));
    }

    public function create()
    {
        $kategoriak = Kategoria::orderBy('ar')->get();
        return view('pizzak.create', compact('kategoriak'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nev' => 'required|string|max:100|unique:pizza,nev',
            'kategorianev' => 'required|exists:kategoria,nev',
            'vegetarianus' => 'nullable|boolean',
        ]);
        $validated['vegetarianus'] = $request->boolean('vegetarianus');
        try {
            Pizza::create($validated);
            return redirect()->route('pizzak.index')->with('success', 'A pizza sikeresen hozzáadva!');
        }
        catch (\Exception $e) {
            return redirect()->back()->withInput()->with('failed', 'A pizza hozzáadása nem sikerült!');
        }
    }

    public function edit(Pizza $pizza)
    {
        $kategoriak = Kategoria::orderBy('ar')->get();
        return view('pizzak.edit', compact('pizza', 'kategoriak'));
    }

    public function update(Request $request, Pizza $pizza)
    {
        $validated = $request->validate([
            'nev' => ['required', 'string', 'max:100', Rule::unique('pizza', 'nev')->ignore($pizza->id)],
            'kategorianev' => 'required|exists:kategoria,nev',
            'vegetarianus' => 'nullable|boolean',
        ]);
        $validated['vegetarianus'] = $request->boolean('vegetarianus');
        try {
            $pizza->update($validated);
            return redirect()->route('pizzak.index')->with('success', 'Az adatok sikeresen módosítva.');
        }
        catch (\Exception $e) {
            return redirect()->back()->withInput()->with('failed', 'Az adatok módosítása nem sikerült.');
        }
    }

    public function destroy(Pizza $pizza)
    {
        try {
            $pizza->delete();
            return redirect()->route('pizzak.index')->with('success', 'A pizza törölve!');
        }
        catch (\Exception $e) {
            return redirect()->back()->with('failed', 'A pizza törlése nem sikerült!');
        }
    }
}
