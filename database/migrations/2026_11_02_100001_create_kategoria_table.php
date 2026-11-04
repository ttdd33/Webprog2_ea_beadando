<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


// a pizzakategóriák és áraik
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kategoria', function (Blueprint $table) {
            $table->id();
            $table->string('nev')->unique();
            $table->integer('ar');
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('kategoria');
    }
};
