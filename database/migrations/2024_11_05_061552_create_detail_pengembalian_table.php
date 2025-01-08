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
		Schema::create('detail_pengembalian', function (Blueprint $table) {
			$table->id();
			$table->string('uuid');
			$table->string('kode_pengembalian');
			$table->string('kode_barang');
			$table->string('deskripsi')->nullable();
			$table->string('status');
			$table->timestamps();
			$table->foreign('kode_pengembalian')->references('kode_pengembalian')->on('pengembalian')->onDelete('cascade');
			$table->foreign('kode_barang')->references('kode_barang')->on('barang')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('detail_pengembalian');
	}
};
