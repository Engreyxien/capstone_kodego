<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CostumerService>
 */
class CostumerServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date = fake()->date('Y-m-d') . ' ' . fake()->time('H:i:s');
        return [
            'cs_name' => fake()->name(),
            'cs_description' => fake()->realText(200, 2),
            'user_id' => fake()->numberBetween(1, 5),
            'tour_id' => fake()->numberBetween(1, 10),
            'accommodation_id' => fake()->numberBetween(1, 8),
            'created_at' => $date,
            'updated_at' => $date, 
        ];
    }
}
