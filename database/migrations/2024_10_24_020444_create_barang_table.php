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
			$table->string('uuid', 36);
			$table->string('kode_barang', 12)->unique();
			$table->string('nama_barang', 50);
			$table->string('nomor_seri', 32);
			$table->string('merk', 50);
			$table->unsignedBigInteger('jenis_barang_id');
			$table->string('status', 50);
			$table->text('deskripsi')->nullable();
			$table->string('qr_code', 50);
			$table->integer('limit');
			$table->integer('sisa_limit');
			$table->string('foto', 50)->nullable();
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
