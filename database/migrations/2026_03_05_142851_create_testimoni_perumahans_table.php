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
        Schema::create('testimoni_perumahans', function (Blueprint $table) {
            $table->id();

            // --- TAMBAHKAN KODE DI BAWAH INI ---
            $table->string('nama_klien'); // Nama penghuni/pembeli
            $table->text('pesan');         // Isi testimoninya
            $table->integer('rating')->default(5); // Angka 1-5 untuk bintang
            $table->string('foto')->nullable();    // Foto orangnya (opsional)
            // ----------------------------------

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimoni_perumahans');
    }
};