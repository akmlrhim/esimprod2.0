<?php

namespace Database\Seeders;

use App\Models\Peruntukan;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PeruntukanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Peruntukan::factory()->count(10)->create();

        Peruntukan::create([
            'uuid' => Str::uuid(),
            'peruntukan' => 'Inspirasi Indonesia',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Peruntukan::create([
            'uuid' => Str::uuid(),
            'peruntukan' => 'Pesona Indonesia',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Peruntukan::create([
            'uuid' => Str::uuid(),
            'peruntukan' => 'Anak Indonesia',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Peruntukan::create([
            'uuid' => Str::uuid(),
            'peruntukan' => 'Jejak Islam',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Peruntukan::create([
            'uuid' => Str::uuid(),
            'peruntukan' => 'Potensi Banua',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Peruntukan::create([
            'uuid' => Str::uuid(),
            'peruntukan' => 'Lensa Olahraga',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Peruntukan::create([
            'uuid' => Str::uuid(),
            'peruntukan' => 'Live Cross',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Peruntukan::create([
            'uuid' => Str::uuid(),
            'peruntukan' => 'Dangdut Keliling',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Peruntukan::create([
            'uuid' => Str::uuid(),
            'peruntukan' => 'Reformasi Birokrasi',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Peruntukan::create([
            'uuid' => Str::uuid(),
            'peruntukan' => 'Hari yang Berkah',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
