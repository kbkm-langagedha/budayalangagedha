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
        Schema::create('anggota_team', function (Blueprint $table) {
            $table->id();

            $table->string('nama');
            $table->string('posisi')->nullable();
            $table->string('photo')->nullable();
            $table->string('nomor_hp')->nullable();
            $table->string('alamat')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('email')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('lainnya')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota_team');
    }
};
