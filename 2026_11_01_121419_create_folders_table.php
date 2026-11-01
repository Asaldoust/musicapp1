<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('folders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')
                ->constrained('users')->cascadeOnDelete();
            $table->string('name');
            $table->string('icon');
            $table->string('color');
            $table->boolean('is_private')->default(true);
            $table->string('system_key')->nullable(); // 'liked' for the Like folder
            $table->timestamps();

            $table->unique(['owner_id', 'system_key']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('folders');
    }
};
