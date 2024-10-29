<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Illuminate\Support\Arr;
use Illuminate\Validation\Rules\Unique;
=======
>>>>>>> 1f47649 (fix)

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class JenisBarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
<<<<<<< HEAD
            'uuid' => Str::random(10),
            'kode_jenis_barang' => 'JBR' . random_int(1, 100),
            'jenis_barang' => fake()->word(),
=======
            'uuid' => Str::random(20),
            'jenis_barang' => fake()->unique()->word, // Menghasilkan kata acak unik
>>>>>>> 1f47649 (fix)
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
