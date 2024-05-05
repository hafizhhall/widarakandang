<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artikel>
 */
class ArtikelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(mt_rand(3,8)),
            'slug' =>$this->faker->slug(),
            'kategori_id' => $this->faker->numberBetween(1,3),
            'user_id' => 1,
            'gambar' => $this->faker->randomElement(['bersama.jpg','dendro.jpg','lab.jpg','pot.jpg','3.jpg','2.jpg']),
            'minibody' => $this->faker->paragraph(),
            'body' => $this->faker->paragraph()

        ];
    }
}
