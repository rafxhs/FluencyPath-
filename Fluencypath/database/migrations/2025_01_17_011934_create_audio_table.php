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
        Schema::create('audio', function (Blueprint $table) {
            $table->id();
            $table->binary('file');
            $table->unsignedBigInteger('idText');
            $table->string('title', 255);
            $table->timestamps();

            $table->foreign('idText')->references('id')->on('text')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audio');
    }
};
