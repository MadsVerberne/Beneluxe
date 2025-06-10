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
        Schema::create('accommodaties_voorziening', function (Blueprint $table) {
            $table->id();
            $table->foreignId('accommodatie_id')->constrained('accommodaties')->onDelete('cascade');
            $table->foreignId('voorziening_id')->constrained('voorzieningen')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accommodaties_voorzieningen');
    }
};
