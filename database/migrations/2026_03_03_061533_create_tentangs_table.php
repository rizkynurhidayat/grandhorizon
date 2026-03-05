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
        Schema::create('tentangs', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('subjudul');
            $table->string('gambar');
            $table->text('deskripsi');
            $table->string('logo');
            $table->string('tekstombol');

            // Tambahan otomatis untuk 4 Keunggulan
            for ($i = 1; $i <= 4; $i++) {
                $table->string("judul_unggulan_$i")->nullable();
                $table->text("desc_unggulan_$i")->nullable();
                $table->string("logo_unggulan_$i")->nullable();
            }

            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tentangs');
    }
};
