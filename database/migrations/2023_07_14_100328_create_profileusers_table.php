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
        Schema::create('profileusers', function (Blueprint $table) {
            $table->unsignedBigInteger('friendlyuser_id');
            $table->unsignedBigInteger('image_id');

            $table->primary(['friendlyuser_id', 'image_id']);
            $table->foreign('friendlyuser_id')->references('id')->on('friendlyusers');
            $table->foreign('image_id')->references('id')->on('images');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profileusers');
    }
};
