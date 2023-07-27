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
        Schema::create('profileworkers', function (Blueprint $table) {
            $table->unsignedBigInteger('jobworker_id');
            $table->unsignedBigInteger('image_id');

            $table->primary(['jobworker_id', 'image_id']);
            $table->foreign('jobworker_id')->references('id')->on('jobworkers');
            $table->foreign('image_id')->references('id')->on('images');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profileworkers');
    }
};
