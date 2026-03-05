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
        Schema::table('tipe_rumahs', function (Blueprint $table) {
            // Mengubah kolom harga dari integer menjadi string
            $table->string('harga')->change();
        });
    }

    public function down(): void
    {
        Schema::table('tipe_rumahs', function (Blueprint $table) {
            // Balikin ke bigInteger kalau di-rollback
            $table->bigInteger('harga')->change();
        });
    }
};
