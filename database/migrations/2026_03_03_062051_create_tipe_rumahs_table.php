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
        Schema::create('tipe_rumahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tipe_rumah');
            $table->string('luas_bangunan');
            $table->bigInteger('harga');
            $table->string('cicilan');
            $table->integer('kamar_tidur');
            $table->integer('kamar_mandi');
            $table->integer('garasi');
            $table->string('gambar');
            $table->string('tekstombol');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipe_rumahs');
    }
};
