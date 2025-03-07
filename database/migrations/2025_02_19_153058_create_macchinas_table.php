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
        Schema::create('macchinas', function (Blueprint $table) {
            $table->id();
            $table->string('nome_modello');
            $table->text('descrizione');
            $table->string('immagine')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('macchinas');
    }
};
