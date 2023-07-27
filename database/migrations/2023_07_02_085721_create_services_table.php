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
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('libelle');
            $table->string('description');
            $table->integer('prix');
            $table->string('photo')->nullable();
            $table->foreignId('categorie_id')->constrained();
            $table->timestamps();
            
            $table->unsignedBigInteger('image_id')->nullable();;
            $table->unsignedBigInteger('jobworker_id');
            $table->foreign('jobworker_id')->references('id')->on('jobworkers');
            $table->foreign('image_id')->references('id')->on('images');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
