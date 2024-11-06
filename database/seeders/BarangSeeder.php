<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Barang::create([
            'uuid' => Str::random(12),
            'kode_barang' => 'B6A8IX20P13D',
            'nama_barang' => 'Canon EOS 6D',
            'jenis_barang' => 'JBR-001',
            'status' => 'Tersedia',
            'deskripsi' => null,
            'qr_code' => '1730858574_qr.png',
            'limit' => '5',
            'sisa_limit' => '5',
            'foto' => '1730858575.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Barang::create([
            'uuid' => Str::random(12),
            'kode_barang' => 'B6A8IX20P13D',
            'nama_barang' => 'Nikon D800E',
            'jenis_barang' => 'JBR-001',
            'status' => 'Tersedia',
            'deskripsi' => null,
            'qr_code' => '1730858608_qr.png',
            'limit' => '5',
            'sisa_limit' => '5',
            'foto' => '1730858608.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
