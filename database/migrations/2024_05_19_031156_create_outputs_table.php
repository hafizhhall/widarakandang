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
        Schema::create('outputs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('katalog_id');
            $table->foreignId('user_id');
            $table->integer('quantity');
            $table->date('date');
            $table->integer('sub_keluar');
            $table->integer('harga_keluar');
            $table->timestamps();

            $table->foreign('katalog_id')->references('id')->on('katalogs')->onDelete('cascade');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outputs');
    }
};
