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
        Schema::create('timestamps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('audio_id')->constrained()->onDelete('cascade'); 
            $table->float('start_time'); 
            $table->float('end_time');
            $table->text('word'); // Palavra ou frase associada
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timestamps');
    }
};
