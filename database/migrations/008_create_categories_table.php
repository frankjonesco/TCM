<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    // RUN MIGRATION

    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('hex', 11)->unique();
            $table->foreignId('user_id');
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('description')->nullable();
            $table->string('color')->nullable();
            $table->timestamps();
            $table->string('status');
        });
    }

    
    // REVERSE MIGRATION

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
    
};
