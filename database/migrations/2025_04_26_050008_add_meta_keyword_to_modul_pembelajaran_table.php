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
        Schema::table('modul_pembelajaran', function (Blueprint $table) {
            $table->json('meta_keyword')->nullable()->after('duration');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('modul_pembelajaran', function (Blueprint $table) {
            $table->dropColumn('meta_keyword');
        });
    }
};
