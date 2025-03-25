<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jabatan::create([
            'uuid' => Str::uuid(),
            'jabatan' => 'Technical Director (TD)',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Jabatan::create([
            'uuid' => Str::uuid(),
            'jabatan' => 'Petugas Khusus',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Jabatan::create([
            'uuid' => Str::uuid(),
            'jabatan' => 'Administrator',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
