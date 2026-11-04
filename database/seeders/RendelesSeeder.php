<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// Forrás: Megoldasok.zip / 04c-Migration és Seeder / AddressSeeder.php
// Módosítás: 21 800 sor van, ezért 500-as csomagokban szúrjuk be (gyorsabb, a tárhelyen is lefut).
class RendelesSeeder extends Seeder
{
    public function run(): void
    {
        $sorok = file(database_path('data/rendeles.txt'), FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        array_shift($sorok); // fejléc sor: pizzanev, darab, felvetel, kiszallitas

        $csomag = [];
        foreach ($sorok as $sor) {
            [$pizzanev, $darab, $felvetel, $kiszallitas] = explode("\t", $sor);
            $csomag[] = [
                'pizzanev' => $pizzanev,
                'darab' => (int) $darab,
                // 2005.11.12 11:21:00 => 2005-11-12 11:21:00
                'felvetel' => str_replace('.', '-', $felvetel),
                'kiszallitas' => str_replace('.', '-', $kiszallitas),
            ];
            if (count($csomag) == 500) {
                DB::table('rendeles')->insert($csomag);
                $csomag = [];
            }
        }
        if (count($csomag) > 0) {
            DB::table('rendeles')->insert($csomag);
        }
    }
}
