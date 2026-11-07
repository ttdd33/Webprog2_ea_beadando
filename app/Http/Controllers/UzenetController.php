<?php

namespace App\Http\Controllers;

use App\Models\Uzenet;

class UzenetController extends Controller
{
    // Csak bejelentkezett felhasználó (auth middleware a web.php-ban)
    public function index()
    {
        // fordított időrend: a legfrissebb üzenet van elöl
        $uzenetek = Uzenet::orderByDesc('created_at')->orderByDesc('id')->get();

        return view('uzenetek', compact('uzenetek'));
    }
}
