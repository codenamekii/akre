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
            'nama' => $this->faker->realText(20),
            'kriteria' => $this->faker->numberBetween(1, 5),
            'sub_kriteria' => $this->faker->realText(30),
            'catatan' => $this->faker->realText(100),
            'tipe' => $this->faker->randomElement(['PDF', 'URL', 'Image']),
            'path' => $this->faker->imageUrl()
        ];
    }
}
