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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('kode_peminjaman')->unique();
            $table->string('nomor_surat');
            $table->string('nomor_peminjaman');
            $table->unsignedBigInteger('peruntukan_id');
            $table->date('tanggal_penggunaan');
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_kembali');
            $table->string('qr_code', 2048)->nullable();
            $table->string('peminjam');
            $table->string('status');
            $table->foreign('peruntukan_id')->references('id')->on('peruntukan')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
