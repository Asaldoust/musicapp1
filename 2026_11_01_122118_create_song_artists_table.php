<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('popular_artists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('artist_id')->unique()
                ->constrained('artists')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('popular_artists');
    }
};
