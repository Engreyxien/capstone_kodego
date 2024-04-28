<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
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
            'check_in' => $this->faker->date('Y-m-d'),
            'check_out' => $this->faker->date('Y-m-d'),
            'number_of_guests' => $this->faker->numberBetween(1, 10),
            'tour_id' => $this->faker->numberBetween(1, 10),
            'accommodation_id' => $this->faker->numberBetween(1, 8),
            'destination_id' => $this->faker->numberBetween(1, 50),
            'user_id' => $this->faker->numberBetween(1, 28),
        ];
    }
}
