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
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('nama_barang');
            $table->string('jenis_barang_id')->unique();
            $table->string('status');
            $table->text('deskripsi');
            $table->string('qr_code');
            $table->integer('limit');
            $table->integer('sisa_limit');
            $table->string('foto', 2048)->nullable();
            $table->foreign('jenis_barang_id')->references('kode_jenis_barang')->on('jenis_barang')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
