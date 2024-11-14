<?php

namespace Database\Factories;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => Str::uuid(),
            'nama_lengkap' => fake()->name(),
            'kode_user' => 'USR' . random_int(1, 999999),
            'email' => fake()->unique()->safeEmail(),
            'nip' => str_pad(rand(1, 99999), 12),
            'nomor_hp' => random_int(1000000000, 9999999999),
            'password' => static::$password ?? Hash::make('admin'),
            'role' => Arr::random(['admin', 'superadmin', 'user']),
            'qr_code' => time() . '_qr.png',
            'jabatan' => fake()->jobTitle(),
            'foto' => 'default.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
