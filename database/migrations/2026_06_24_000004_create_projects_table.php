<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->longText('body')->nullable();
            $table->json('tags')->nullable();
            $table->string('icon')->default('code');
            $table->string('color')->default('from-purple-500 to-pink-500');
            $table->string('image')->nullable();
            $table->string('link')->nullable();
            $table->string('github')->nullable();
            $table->boolean('featured')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
