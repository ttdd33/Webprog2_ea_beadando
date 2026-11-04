<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// Forrás: Megoldasok.zip / 04c-Migration és Seeder / WorkerSeeder.php
class PizzaSeeder extends Seeder
{
    public function run(): void
    {
        $sorok = file(database_path('data/pizza.txt'), FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        array_shift($sorok); // fejléc sor: nev, kategorianev, vegetarianus

        foreach ($sorok as $sor) {
            [$nev, $kategorianev, $vegetarianus] = explode("\t", $sor);
            DB::table('pizza')->insert([
                'nev' => $nev,
                'kategorianev' => $kategorianev,
                'vegetarianus' => (int) $vegetarianus,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
