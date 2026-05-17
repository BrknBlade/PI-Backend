<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Business;
use App\Models\CutType;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
   public function run(): void
{
    User::factory()->create([
        'name' => 'frank',
        'email' => 'frank@email.com',
        'role' => 2
    ]);

    Business::factory()->create();

    User::factory(5)->create();

    CutType::factory(5)->create();

    Booking::factory(20)->create();

    $this->call([
        EmployeeSeeder::class,
        CutTypeSeeder::class,
    ]);
}
}
