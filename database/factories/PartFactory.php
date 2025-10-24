<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class PartFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'sku' => 'YAM-' . strtoupper($this->faker->bothify('??###')),
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->sentence(),
            'category_id' => Category::factory(),
            'quantity' => $this->faker->numberBetween(0, 200),
            'price' => $this->faker->randomFloat(2, 1, 1500),
            'location' => $this->faker->bothify('A-?#'),
        ];
    }
}
