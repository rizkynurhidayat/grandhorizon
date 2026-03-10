<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('footers', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('copyright');
            $table->string('fb_name')->nullable();
            $table->string('fb_url')->nullable();
            $table->string('tw_name')->nullable();
            $table->string('tw_url')->nullable();
            $table->string('ig_name')->nullable();
            $table->string('ig_url')->nullable();
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('footers');
    }
};