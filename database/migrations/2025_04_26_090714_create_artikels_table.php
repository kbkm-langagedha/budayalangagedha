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
        Schema::create('artikels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('master_artikel_id');
            $table->foreign('master_artikel_id')->references('id')->on('master_artikel')->onDelete('cascade');
            $table->string('judul');
            $table->string('slug');
            $table->text('ringkasan')->nullable();
            $table->longText('konten');
            $table->string('gambar')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamp('published_at')->nullable();
            $table->integer('view_count')->default(0);
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikels');
    }
};
