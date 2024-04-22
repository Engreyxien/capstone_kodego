<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Language;
use Faker\Generator;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Language>
 */
class LanguageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Language::class;
    public function definition(): array
    {

        
        return [
            'language_name' => this->faker->languageName(),
            'user_id' => fake()->numberBetween(1, 10),
            'country_id' => fake()->numberBetween(1, 250),
        ];
    }
}
