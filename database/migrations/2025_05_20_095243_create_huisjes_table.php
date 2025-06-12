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
        Schema::create('accommodaties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gebruiker_id')->constrained('users')->onDelete('cascade');
            $table->string('titel');
            $table->text('beschrijving')->nullable();
            $table->string('locatie')->nullable();
            $table->integer('aantal_bedden')->default(1);
            $table->integer('aantal_badkamers')->default(1);
            $table->decimal('prijs_per_nacht', 8, 2);
            $table->integer('aantal_personen')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accommodatie');
    }
};
