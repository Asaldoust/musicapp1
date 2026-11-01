<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('folder_songs', function (Blueprint $table) {
            $table->foreignId('folder_id')
                ->constrained('folders')->cascadeOnDelete();
            $table->foreignId('song_id')
                ->constrained('songs')->cascadeOnDelete();
            $table->timestamps();

            $table->primary(['folder_id', 'song_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('folder_songs');
    }
};
