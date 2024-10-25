<?php

namespace Database\Seeders;

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
        DB::table('jenis_barang')->insert([
            'uuid' => Str::random(20),
            'jenis_barang' => 'Barang',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
