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
            $table->string('alamat')->nullable()->after('origin');
            $table->string('phone')->nullable()->after('origin');
            $table->string('name')->nullable()->after('origin');
            $table->string('pos')->nullable()->after('origin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn(['alamat','phone','name','pos']);
        });
    }
};
