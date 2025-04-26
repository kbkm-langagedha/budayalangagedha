<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('modul_pembelajaran', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('deskripsi')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('video_path')->nullable();
            $table->string('url_video')->nullable();
            $table->enum('is_active', ['aktif', 'tidak_aktif', 'draft'])->default('draft');
            $table->unsignedBigInteger('user_create');
            $table->string('slug')->unique();
            $table->unsignedBigInteger('view')->default(0);
            $table->timestamp('published_at')->nullable();
            $table->string('duration')->nullable();
            $table->timestamps();

            $table->foreign('user_create')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modul_pembelajaran');
    }
};
