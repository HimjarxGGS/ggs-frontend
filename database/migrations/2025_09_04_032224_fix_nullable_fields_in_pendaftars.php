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
        Schema::table('pendaftars', function (Blueprint $table) {
            $table->string('nama_lengkap', 255)->nullable()->change();
            $table->date('date_of_birth')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('asal_instansi', 255)->nullable()->change();
            $table->string('no_telepon', 20)->nullable()->change();
            $table->text('riwayat_penyakit')->nullable()->change();
            $table->string('registrant_picture', 2048)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pendaftars', function (Blueprint $table) {
            // Kembalikan ke NOT NULL (jika dibutuhkan)
            $table->string('nama_lengkap', 255)->nullable(false)->change();
            $table->date('date_of_birth')->nullable(false)->change();
            $table->string('email')->nullable(false)->change();
            $table->string('asal_instansi', 255)->nullable(false)->change();
            $table->string('no_telepon', 15)->nullable(false)->change();
            $table->text('riwayat_penyakit')->nullable(false)->change();
            $table->string('registrant_picture', 2048)->nullable(false)->change();
        });
    }
};
