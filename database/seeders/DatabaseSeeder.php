<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Az adatbázis feltöltése: php artisan migrate:fresh --seed
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
    }
}
