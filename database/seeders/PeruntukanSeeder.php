<?php

namespace Database\Seeders;

use App\Models\Peruntukan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeruntukanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Peruntukan::factory()->count(10)->create();
    }
}
