<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// Forrás: Megoldasok.zip / 07-08-Authentication / UserSeeder.php
class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@netpizza.hu',
            'password' => bcrypt('admin1234'),
            'role' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Teszt Látogató',
            'email' => 'user@netpizza.hu',
            'password' => bcrypt('user1234'),
            'role' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
