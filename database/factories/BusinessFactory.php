<?php

namespace Database\Factories;

use App\Enums\Roles;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Business>
 */
class BusinessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'owner_id' => User::where('role', Roles::OWNER)->first()->id,
            'company_name' => fake()->company(),
            'phone_number' => fake()->phoneNumber(),
            'email' => fake()->companyEmail(),
            'address' => fake()->address(),
            'week_open_at' => '08:00:00',
            'week_close_at' => '20:00:00',
            'weekend_open_at' => fake()->time(),
            'weekend_close_at' => fake()->time(),
        ];
    }
}
