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
        Schema::create('accommodaties_foto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('accommodatie_id')->constrained('accommodaties')->onDelete('cascade');
            $table->string('foto_url');
            $table->integer('volgorde')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accommodaties_foto');
    }
};
