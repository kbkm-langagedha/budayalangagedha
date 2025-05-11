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
        Schema::create('kalender_ritual', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ritual');
            $table->text('deskripsi');
            $table->integer('tanggal'); // Hari dalam bulan (1-31)
            $table->integer('bulan'); // Bulan (1-12)
            $table->string('lokasi');
            $table->text('keterangan')->nullable();
            $table->string('gambar')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kalender_ritual');
    }
};
