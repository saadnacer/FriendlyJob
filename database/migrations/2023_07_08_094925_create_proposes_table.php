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
        Schema::create('proposes', function (Blueprint $table) {
            $table->unsignedBigInteger('jobworker_id');
            $table->unsignedBigInteger('service_id');

            $table->primary(['jobworker_id', 'service_id']);
            $table->foreign('jobworker_id')->references('id')->on('jobworkers');
            $table->foreign('service_id')->references('id')->on('services');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposes');
    }
};
