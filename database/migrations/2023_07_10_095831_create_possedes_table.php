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
        Schema::create('possedes', function (Blueprint $table) {
            $table->unsignedBigInteger('jobworker_id');
            $table->unsignedBigInteger('metier_id');

            $table->primary(['jobworker_id', 'metier_id']);
            $table->foreign('jobworker_id')->references('id')->on('jobworkers');
            $table->foreign('metier_id')->references('id')->on('metiers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('possede');
    }
};
