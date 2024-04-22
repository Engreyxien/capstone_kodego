<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tour>
 */
class TourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        $date = $faker->date('Y-m-d') . ' ' . $faker->time('H:i:s');
        
        return [
            'tour_title' => $faker->realText(20),
            'tour_description' => $faker->realText(200, 2),
            'tour_price' => $faker->numberBetween(100, 5000),
            'tour_duration' => $faker->randomNumber(1, 5),
            'country_id' => $faker->numberBetween(1, 250),
            'created_at' => $date,
            'updated_at' => $date,
        ];
    }
}