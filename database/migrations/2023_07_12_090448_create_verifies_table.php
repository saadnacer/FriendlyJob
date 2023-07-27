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
        Schema::create('verifies', function (Blueprint $table) {
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('commentaire_id');
            $table->unsignedBigInteger('reservation_id');
            $table->unsignedBigInteger('friendlyuser_id');

            $table->primary(['admin_id', 'commentaire_id', 'reservation_id', 'friendlyuser_id']);
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->foreign('commentaire_id')->references('id')->on('commentaires');
            $table->foreign('reservation_id')->references('id')->on('reservations');
            $table->foreign('friendlyuser_id')->references('id')->on('friendlyusers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verifies');
    }
};
