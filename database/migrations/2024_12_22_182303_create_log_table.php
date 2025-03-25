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
		Schema::create('log', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('id_user');
			$table->timestamp('waktu_login');
			$table->string('gambar', 2048)->nullable();

			$table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('log');
	}
};
