<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('metiers', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('libelle');
        $table->unsignedBigInteger('categorie_id'); // Vérifiez que cette ligne est présente
        $table->foreign('categorie_id')->references('id')->on('categories');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metiers');
    }
};