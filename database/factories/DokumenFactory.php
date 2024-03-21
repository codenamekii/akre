<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dokumen>
 */
class DokumenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->word(),
            'kriteria' => $this->faker->randomElement(['1', '2', '3', '4', '5']),
            'sub_kriteria' => $this->faker->word(),
            'catatan' => $this->faker->sentence(),
            'tipe' => $this->faker->randomElement(['pdf', 'url', 'image']),
            'file' => $this->faker->word(),
        ];
    }
}
