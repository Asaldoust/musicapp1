<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedInteger('duration'); // seconds
            // single track => album_id is null
            $table->foreignId('album_id')->nullable()
                ->constrained('albums')->nullOnDelete();
            $table->foreignId('audio_file_id')
                ->constrained('files')->restrictOnDelete();
            $table->foreignId('cover_image_id')
                ->constrained('files')->restrictOnDelete();
            $table->unsignedBigInteger('play_count')->default(0)->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('songs');
    }
};
