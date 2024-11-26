<?php

namespace Database\Factories;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => Str::random(16),
            'kode_barang' => substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 12),
            'nama_barang' => fake()->word(),
            'nomor_seri' => substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 16),
            'merk' => fake()->company(),
            'jenis_barang_id' => Arr::random([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),
            'status' => 'tersedia',
            'deskripsi' => fake()->sentence(),
            'limit' => rand(1, 5),
            'sisa_limit' => rand(1, 5),
            'qr_code' => now() . '_qr.png',
            'foto' => 'default.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
