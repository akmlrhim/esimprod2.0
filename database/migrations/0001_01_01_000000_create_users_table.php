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
		Schema::create('users', function (Blueprint $table) {
			$table->id();
			$table->string('uuid', 36);
			$table->string('nama_lengkap', 100);
			$table->string('kode_user', 20)->unique();
			$table->string('email', 100)->unique();
			$table->string('nip')->unique();
			$table->string('nomor_hp', 13);
			$table->unsignedBigInteger('jabatan_id');
			$table->string('qr_code', 50);
			$table->string('role', 20)->default('user');
			$table->timestamp('email_verified_at')->nullable();
			$table->string('password', 16)->nullable()->default(null);
			$table->string('foto', 50)->nullable();
			$table->rememberToken();
			$table->timestamps();

			$table->foreign('jabatan_id')->references('id')->on('jabatan')->onDelete('cascade');
		});

		Schema::create('password_reset_tokens', function (Blueprint $table) {
			$table->string('email')->primary();
			$table->string('token');
			$table->timestamp('created_at')->nullable();
		});

		Schema::create('sessions', function (Blueprint $table) {
			$table->string('id')->primary();
			$table->foreignId('user_id')->nullable()->index();
			$table->string('ip_address', 45)->nullable();
			$table->text('user_agent')->nullable();
			$table->longText('payload');
			$table->integer('last_activity')->index();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('users');
		Schema::dropIfExists('password_reset_tokens');
		Schema::dropIfExists('sessions');
	}
};
