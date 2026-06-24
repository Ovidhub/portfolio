<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();

            // Identity
            $table->string('name')->default('Alex Johnson');
            $table->string('title')->default('Web Developer');
            $table->string('location')->default('USA');
            $table->string('tagline')->nullable();
            $table->text('hero_intro')->nullable();
            $table->text('about_bio')->nullable();
            $table->string('hero_image')->nullable();
            $table->string('about_image')->nullable();
            $table->string('cv_path')->nullable();

            // Stats
            $table->string('stat_projects')->default('150+');
            $table->string('stat_clients')->default('80+');
            $table->string('stat_experience')->default('8+');

            // Contact
            $table->string('email')->default('hello@example.com');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();

            // Socials (json: [{platform, url}])
            $table->json('socials')->nullable();

            // SEO defaults
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('og_image')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
