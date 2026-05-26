<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Business;
use App\Models\Employees;
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
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'role' => 1
        ]);

        User::factory()->create([
            'name' => 'Frank',
            'email' => 'frank@email.com',
            'role' => 2
        ]);

        Employees::create([
            'name' => 'Carlos Ruiz',
            'role' => 'Barbero',
            'specialty' => 'Corte clásico y afeitado',
            'image_url' => 'Garfield.jpg',
        ]);

        Employees::create([
            'name' => 'María López',
            'role' => 'Estilista',
            'specialty' => 'Coloración y mechas',
            'image_url' => 'donsexo.jpg',
        ]);

        Employees::create([
            'name' => 'Javier Martín',
            'role' => 'Colorista',
            'specialty' => 'Tinte y decoloración',
            'image_url' => 'DonPaquito.webp',
        ]);

        Business::factory()->create();

        $this->call(CutTypeSeeder::class);

        // Booking::factory(15)->create();
    }
}
