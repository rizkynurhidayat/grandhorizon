<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('footers', function (Blueprint $table) {
            $table->string('biaya_judul')->nullable()->after('ig_url');
            $table->text('biaya_items')->nullable()->after('biaya_judul');
        });
    }

    public function down(): void {
        Schema::table('footers', function (Blueprint $table) {
            $table->dropColumn(['biaya_judul', 'biaya_items']);
        });
    }
};