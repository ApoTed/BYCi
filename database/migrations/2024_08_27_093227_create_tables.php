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
        Schema::create('evento', function (Blueprint $table) {
            $table->id();
            $table->string('titolo');
            $table->string('contenuto');
            $table->string('immagine');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('commento', function (Blueprint $table) {
            $table->id();
            $table->string('contenuto');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('evento_id');
            $table->timestamps();
        });
        Schema::table('commento', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('evento', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('commento', function (Blueprint $table) {
            $table->foreign('evento_id')->references('id')->on('evento');
        });
        
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tables');
    }
};
