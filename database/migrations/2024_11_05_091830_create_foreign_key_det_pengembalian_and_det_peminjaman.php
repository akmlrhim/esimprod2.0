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
        Schema::table('peminjaman', function (Blueprint $table) {
            $table->foreign('kode_detail_peminjaman')
                ->references('kode_detail_peminjaman')
                ->on('detail_peminjaman')
                ->onDelete('cascade');
        });

        Schema::table('detail_peminjaman', function (Blueprint $table) {
            $table->foreign('kode_peminjaman')
                ->references('kode_peminjaman')
                ->on('peminjaman')
                ->onDelete('cascade');
        });

        Schema::table('pengembalian', function (Blueprint $table) {
            $table->foreign('kode_detail_pengembalian')
                ->references('kode_detail_pengembalian')
                ->on('detail_pengembalian')
                ->onDelete('cascade');
        });

        Schema::table('detail_pengembalian', function (Blueprint $table) {
            $table->foreign('kode_pengembalian')
                ->references('kode_pengembalian')
                ->on('pengembalian')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foreign_key_det_pengembalian_and_det_peminjaman');
    }
};
