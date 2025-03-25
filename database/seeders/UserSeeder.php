<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		// User::factory()->count(10)->create();

		User::create([
			'uuid' => Str::uuid(),
			'nama_lengkap' => 'Superadmin',
			'kode_user' => 'USR061224',
			'email' => 'superadmin@gmail.com',
			'nip' => '1992345657435123',
			'nomor_hp' => '089234898765',
			'role' => 'superadmin',
			'jabatan_id' => 3,
			'password' => Hash::make('password'),
			'qr_code' => time() . '_qr.png',
			'foto' => 'default.jpeg',
			'created_at' => now(),
			'updated_at' => now()
		]);
	}
}
