<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// pizza (nev, kategorianev, vegetarianus)
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pizza', function (Blueprint $table) {
            $table->id();
            $table->string('nev')->unique();
            $table->string('kategorianev');
            $table->boolean('vegetarianus')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pizza');
    }
};
