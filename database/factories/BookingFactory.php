<?php

namespace Database\Factories;

use App\Models\CutType;
use App\Models\User;
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
        return [
            'gender' => fake()->randomElement(['male','female']),
            'description' => fake()->text(100),
            'date' => fake()->date(),
            'hour' => fake()->time('H:i'),
            'user_id' => User::inRandomOrder()->first()->id,
            'cut_type_id' => CutType::inRandomOrder()->first()->id,
            'status' => fake()->randomElement(['pending','accepted','cancelled']),
        ];
    }
}
