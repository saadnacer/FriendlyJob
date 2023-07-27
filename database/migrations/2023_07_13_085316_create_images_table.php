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
<<<<<<<< HEAD:database/migrations/2023_07_13_085316_create_images_table.php
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->binary('image');
========
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('libelle');
>>>>>>>> 9e19178afa1a128d832d2635887e6e8ce2522545:database/migrations/2023_07_02_092503_create_categories_table.php
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
