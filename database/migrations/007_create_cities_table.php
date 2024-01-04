<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    // RUN MIGRATION

    public function up(): void
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('state_id')->nullable();
            $table->string('name');
            $table->string('slug');
        });
    }

    
    // REVERSE MIGRATION

    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
    
};
