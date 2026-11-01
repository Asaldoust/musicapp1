<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('album_artists', function (Blueprint $table) {
            $table->foreignId('album_id')
                ->constrained('albums')->cascadeOnDelete();
            $table->foreignId('artist_id')
                ->constrained('artists')->cascadeOnDelete();
            $table->unsignedInteger('display_order')->default(0);

            $table->primary(['album_id', 'artist_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('album_artists');
    }
};
