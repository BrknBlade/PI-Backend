<?php

namespace Database\Seeders;

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
        ]);

        User::factory(5)->create();

        CutType::factory(5)->create();
    }
}
