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
        Schema::create('pengembalian', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('kode_pengembalian')->unique();
            $table->string('kode_peminjaman');
            $table->date('tanggal_kembali');
            $table->string('peminjam');
            $table->string('status');
            $table->timestamps();
            $table->foreign('kode_peminjaman')->references('kode_peminjaman')->on('peminjaman')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalian');
    }
};
