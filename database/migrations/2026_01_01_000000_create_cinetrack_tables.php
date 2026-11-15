<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('description')->nullable();
            $table->timestamps();
        });
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('code', 2)->unique();
            $table->string('region')->nullable();
            $table->timestamps();
        });
        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('description')->nullable();
            $table->timestamps();
        });
        Schema::create('titles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('sequel_of_id')->nullable()->constrained('titles')->nullOnDelete();
            $table->string('name');
            $table->string('original_title')->nullable();
            $table->text('description')->nullable();
            $table->date('release_date')->nullable();
            $table->string('content_type');
            $table->unsignedSmallInteger('runtime_minutes')->nullable();
            $table->string('age_rating')->nullable();
            $table->string('original_language')->nullable();
            $table->string('poster_url')->nullable();
            $table->timestamps();
        });
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->nullable()->constrained()->nullOnDelete();
            $table->string('full_name');
            $table->date('birth_date')->nullable();
            $table->date('death_date')->nullable();
            $table->text('biography')->nullable();
            $table->string('social_media_url')->nullable();
            $table->timestamps();
        });
        Schema::create('seasons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('title_id')->constrained()->cascadeOnDelete();
            $table->unsignedSmallInteger('season_number');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->date('release_date')->nullable();
            $table->unique(['title_id', 'season_number']);
            $table->timestamps();
        });
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('season_id')->constrained()->cascadeOnDelete();
            $table->unsignedSmallInteger('episode_number');
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedSmallInteger('runtime_minutes')->nullable();
            $table->date('release_date')->nullable();
            $table->unique(['season_id', 'episode_number']);
            $table->timestamps();
        });
        Schema::create('watchlist_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('title_id')->constrained()->cascadeOnDelete();
            $table->string('status')->default('planned');
            $table->timestamp('started_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->text('personal_notes')->nullable();
            $table->unique(['user_id', 'title_id']);
            $table->timestamps();
        });
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('title_id')->constrained()->cascadeOnDelete();
            $table->decimal('rating', 3, 1);
            $table->text('review_text')->nullable();
            $table->boolean('spoiler_flag')->default(false);
            $table->boolean('is_hidden')->default(false);
            $table->unique(['user_id', 'title_id']);
            $table->timestamps();
        });
        Schema::create('episode_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('episode_id')->constrained()->cascadeOnDelete();
            $table->decimal('rating', 3, 1);
            $table->text('review_text')->nullable();
            $table->boolean('spoiler_flag')->default(false);
            $table->boolean('is_hidden')->default(false);
            $table->unique(['user_id', 'episode_id']);
            $table->timestamps();
        });
        Schema::create('viewings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('title_id')->constrained()->cascadeOnDelete();
            $table->timestamp('watched_at');
            $table->unsignedSmallInteger('minutes_watched')->nullable();
            $table->index(['user_id', 'watched_at']);
            $table->timestamps();
        });
        Schema::create('episode_viewings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('episode_id')->constrained()->cascadeOnDelete();
            $table->timestamp('watched_at');
            $table->unsignedSmallInteger('minutes_watched')->nullable();
            $table->index(['user_id', 'watched_at']);
            $table->timestamps();
        });
        Schema::create('title_credits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('title_id')->constrained()->cascadeOnDelete();
            $table->foreignId('person_id')->constrained()->cascadeOnDelete();
            $table->string('credit_type');
            $table->string('character_name')->nullable();
            $table->unsignedSmallInteger('credit_order')->nullable();
            $table->string('credited_as')->nullable();
            $table->timestamps();
        });
        Schema::create('genre_title', function (Blueprint $table) {
            $table->foreignId('title_id')->constrained()->cascadeOnDelete();
            $table->foreignId('genre_id')->constrained()->cascadeOnDelete();
            $table->primary(['title_id', 'genre_id']);
        });
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('role_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('country_id')->nullable()->constrained()->nullOnDelete();
            $table->string('username')->nullable()->unique();
            $table->date('date_of_birth')->nullable();
            $table->boolean('is_active')->default(true);
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropConstrainedForeignId('role_id');
            $table->dropConstrainedForeignId('country_id');
            $table->dropColumn(['username', 'date_of_birth', 'is_active']);
        });
        Schema::dropIfExists('genre_title');
        Schema::dropIfExists('title_credits');
        Schema::dropIfExists('episode_viewings');
        Schema::dropIfExists('viewings');
        Schema::dropIfExists('episode_reviews');
        Schema::dropIfExists('reviews');
        Schema::dropIfExists('watchlist_entries');
        Schema::dropIfExists('episodes');
        Schema::dropIfExists('seasons');
        Schema::dropIfExists('people');
        Schema::dropIfExists('titles');
        Schema::dropIfExists('genres');
        Schema::dropIfExists('countries');
        Schema::dropIfExists('roles');
    }
};
