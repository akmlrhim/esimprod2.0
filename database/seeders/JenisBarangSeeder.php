<?php

namespace Database\Seeders;

use App\Models\JenisBarang;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JenisBarang::create([
            'uuid' => Str::random(12),
            'kode_jenis_barang' => 'JBR-001',
            'jenis_barang' => 'Kamera',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        JenisBarang::create([
            'uuid' => Str::random(12),
            'kode_jenis_barang' => 'JBR-002',
            'jenis_barang' => 'Lensa',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        JenisBarang::create([
            'uuid' => Str::random(12),
            'kode_jenis_barang' => 'JBR-003',
            'jenis_barang' => 'Action Cam',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        JenisBarang::create([
            'uuid' => Str::random(12),
            'kode_jenis_barang' => 'JBR-004',
            'jenis_barang' => 'Baterai',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        JenisBarang::create([
            'uuid' => Str::random(12),
            'kode_jenis_barang' => 'JBR-005',
            'jenis_barang' => 'Drone',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        JenisBarang::create([
            'uuid' => Str::random(12),
            'kode_jenis_barang' => 'JBR-006',
            'jenis_barang' => 'Microphone',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        JenisBarang::create([
            'uuid' => Str::random(12),
            'kode_jenis_barang' => 'JBR-007',
            'jenis_barang' => 'Smartphone',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        JenisBarang::create([
            'uuid' => Str::random(12),
            'kode_jenis_barang' => 'JBR-008',
            'jenis_barang' => 'Equipment',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        JenisBarang::create([
            'uuid' => Str::random(12),
            'kode_jenis_barang' => 'JBR-009',
            'jenis_barang' => 'Komunikasi',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        JenisBarang::create([
            'uuid' => Str::random(12),
            'kode_jenis_barang' => 'JBR-010',
            'jenis_barang' => 'Memory',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
