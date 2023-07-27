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
        Schema::create('commentaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('reservation_id');
            $table->unsignedBigInteger('friendlyuser_id');
            $table->string('contenu');
            $table->integer('note');
            $table->date('date_commentaire');
            $table->timestamps();

            $table->foreign('friendlyuser_id')->references('id')->on('friendlyusers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commentaires');
    }
};
