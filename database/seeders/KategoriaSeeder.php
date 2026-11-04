<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// Forrás: Megoldasok.zip / 04c-Migration és Seeder / WorkerSeeder.php
// Módosítás: az adatokat nem kézzel írjuk be, hanem a kapott kategoria.txt fájlból olvassuk.
class KategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $sorok = file(database_path('data/kategoria.txt'), FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        array_shift($sorok); // fejléc sor: nev, ar

        foreach ($sorok as $sor) {
            [$nev, $ar] = explode("\t", $sor);
            DB::table('kategoria')->insert([
                'nev' => $nev,
                'ar' => (int) $ar,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
