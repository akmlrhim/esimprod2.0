<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('credits')->insert([
            'uuid' => Str::random(20),
            'project_leader' => 'Lionel',
            'system_analyst' => 'Lionel',
            'frontend_developer' => 'Lionel',
            'backend_developer' => 'Lionel',
            'uiux_designer' => 'Lionel',
            'administrator_contact' => '2393579272',
            'guidebook' => 'Lionel',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
