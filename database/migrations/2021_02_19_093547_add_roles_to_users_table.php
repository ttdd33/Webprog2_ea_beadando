<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Forrás: Megoldasok.zip / 07-08-Authentication (role mező a users táblához)
// Szerepkörök: 1 = admin, 2 = regisztrált látogató (alapértelmezett)
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('role')->after('email')->default(2);
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};
