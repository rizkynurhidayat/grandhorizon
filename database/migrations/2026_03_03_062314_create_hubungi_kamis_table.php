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
        Schema::create('hubungi_kamis', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->string('no_hp');
            $table->string('email');
            $table->date('tanggal');
            $table->text('pesan');
            $table->string('teks_tombol')->nullable();
            $table->string('link_tombol')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hubungi_kamis');
    }
};
