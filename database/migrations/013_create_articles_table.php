<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    // RUN MIGRATION

    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('hex', 11);
            $table->foreignId('user_id');
            $table->string('resource_model');
            $table->bigInteger('resource_id');
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('subtitle')->nullable();
            $table->longText('introduction')->nullable();
            $table->longText('body')->nullable();
            $table->bigInteger('main_image_id')->nullable();
            $table->integer('views')->default(0);
            $table->timestamps();
            $table->string('status');
        });
    }

    
    // REVERSE MIGRATION

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }

};
