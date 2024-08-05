<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'id_category' => Category::all()->random()->id,
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 1, 10000),
        ];
    }
}
