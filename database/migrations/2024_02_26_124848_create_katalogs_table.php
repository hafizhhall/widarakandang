<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Type\Integer;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('katalogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_id');
            $table->foreignId('supplier_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('ukuran');
            $table->string('berbunga');
            $table->string('suhu');
            $table->string('status');
            $table->unsignedInteger('jumlah');
            $table->unsignedInteger('harga');
            $table->text('excerpt');
            $table->text('body');
            $table->text('perawatan');
            $table->string('gambar');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('katalogs');
    }
};
