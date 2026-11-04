<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


// rendeles (az, pizzanev, darab, felvetel, kiszallitas) – az "az" mező helyett az id() a számláló
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rendeles', function (Blueprint $table) {
            $table->id();
            $table->string('pizzanev');
            $table->integer('darab');
            $table->dateTime('felvetel');
            $table->dateTime('kiszallitas');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rendeles');
    }
};
