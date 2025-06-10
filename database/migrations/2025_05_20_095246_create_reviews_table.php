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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('accommodatie_id')->constrained('accommodaties')->onDelete('cascade');
            $table->foreignId('gebruiker_id')->constrained('gebruikers')->onDelete('cascade');
            $table->tinyInteger('beoordeling'); // bijvoorbeeld 1-5 sterren
            $table->text('opmerking')->nullable();
            $table->date('datum');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
