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
            $table->string('nama_barang')->unique();
            $table->unsignedBigInteger('jenis_barang_id');
            $table->string('status');
            $table->string('qr_code')->unique();
            $table->integer('limit');
            $table->integer('sisa_limit');
            $table->string('foto', 2048)->nullable();
            $table->foreign('jenis_barang_id')->references('id')->on('jenis_barang')->onDelete('cascade');
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
