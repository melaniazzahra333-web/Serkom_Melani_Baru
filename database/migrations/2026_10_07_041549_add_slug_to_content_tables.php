<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('berita', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('judul');
        });

        // Schema::table('guru', function (Blueprint $table) {
        //     $table->string('slug')->nullable()->after('nama_guru');
        // });

        Schema::table('ekstrakurikuler', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('nama_eskul');
        });

        // Schema::table('galeri', function (Blueprint $table) {
        //     $table->string('slug')->nullable()->after('judul');
        // });
    }

    public function down(): void
    {
        Schema::table('berita', function (Blueprint $table) {
            $table->dropColumn('slug');
        });

        // Schema::table('guru', function (Blueprint $table) {
        //     $table->dropColumn('slug');
        // });

        Schema::table('ekstrakurikuler', function (Blueprint $table) {
            $table->dropColumn('slug');
        });

        // Schema::table('galeri', function (Blueprint $table) {
        //     $table->dropColumn('slug');
        // });
    }
};