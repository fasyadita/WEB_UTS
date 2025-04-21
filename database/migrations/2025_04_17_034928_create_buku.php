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
        Schema::create('buku', function (Blueprint $table) {
            $table->id('id_buku');
            $table->string('judul', 255);
            $table->string('penulis', 100);
            $table->string('penerbit', 100);
            $table->unsignedBigInteger('id_kategori');
            $table->integer('jumlah_tersedia');
        
            // Foreign Key
            $table->foreign('id_kategori')->references('id_kategori')->on('kategori');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
