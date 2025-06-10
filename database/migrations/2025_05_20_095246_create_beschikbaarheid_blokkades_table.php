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
        Schema::create('beschikbaarheid_blokkades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('accommodatie_id')->constrained('accommodaties')->onDelete('cascade');
            $table->date('van_datum');
            $table->date('tot_datum');
            $table->string('reden')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beschikbaarheid_blokkades');
    }
};
