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
        Schema::table('transactions', function (Blueprint $table) {
            $table->string('origin')->nullable()->after('resi');
            $table->string('kurir')->nullable()->after('resi');
            $table->string('layanan')->nullable()->after('resi');
            $table->unsignedInteger('berat')->nullable()->after('resi');
            $table->string('estimasi')->nullable()->after('resi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn(['origin','kurir','layanan','berat','estimasi']);
        });
    }
};
