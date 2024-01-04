<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    // RUN MIGRATION

    public function up(): void
    {
        Schema::create('criminal_cases', function (Blueprint $table) {
            $table->id();
            $table->string('hex', 11)->unique();
            $table->foreignId('user_id');
            $table->foreignId('category_id')->nullable();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('short_name')->nullable();
            $table->longText('caption')->nullable();
            $table->longText('description')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->foreignId('state_id')->nullable();
            $table->foreignId('county_id')->nullable();
            $table->foreignId('city_id')->nullable();
            $table->integer('views')->default(0);
            $table->bigInteger('main_image_id')->nullable();
            $table->timestamps();
            $table->string('status');
        });
    }

    
    // REVERSE MIGRATION

    public function down(): void
    {
        Schema::dropIfExists('criminal_cases');
    }
    
};
