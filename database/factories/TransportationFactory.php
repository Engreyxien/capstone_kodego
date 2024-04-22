<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TransportationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        $transpoTypes = ['plane', 'ship', 'train', 'bus', 'motorcycle', 'car', 'others'];
        return [
            'transpo_type'=> $this->faker->randomElement($transpoTypes),
            'transpo_description' => $this->faker->realText(20),
            'transpo_price' => $this->faker->numberBetween(1, 5000),
            'tour_id'=> $this->faker->numberBetween(1, 10),
            'user_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
