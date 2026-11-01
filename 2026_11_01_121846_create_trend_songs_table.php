<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trend_songs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('song_id')->unique()
                ->constrained('songs')->cascadeOnDelete();
            $table->decimal('trend_score', 10, 2)->default(0)->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trend_songs');
    }
};
