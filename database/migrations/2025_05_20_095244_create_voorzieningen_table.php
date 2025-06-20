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
        Schema::create('boekingen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gebruiker_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('accommodatie_id')->constrained('accommodaties')->onDelete('cascade');
            $table->date('van_datum');
            $table->date('tot_datum');
            $table->decimal('totaal_prijs', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boekingen');
    }
};
