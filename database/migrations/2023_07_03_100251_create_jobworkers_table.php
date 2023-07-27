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
        Schema::create('jobworkers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('email');
            $table->string('pwd');
            $table->string('siret');
            $table->unsignedBigInteger('categorie_id')->nullable();
            $table->timestamps();

            $table->unique('siret');

            $table->foreign('categorie_id')->references('id')->on('categories');
        });

        Schema::create('metiers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('libelle');
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('libelle');
            $table->timestamps();
        });
    }

    




    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobworkers');
        Schema::dropIfExists('metiers');
        Schema::dropIfExists('categories');
    }


};