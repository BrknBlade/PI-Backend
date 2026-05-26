<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Business;
use App\Models\CutType;
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
            'name' => 'frank',
            'email' => 'frank@email.com',
            'role' => 2
        ]);

        Employees::create([
            'name'      => 'Don sexo',
            'role'      => 'Barbero',
            'specialty' => 'Corte clásico y afeitado',
            'image_url' => 'Garfield.jpg',
        ]);

        Employees::create([
            'name'      => 'Lupelto',
            'role'      => 'Estilista',
            'specialty' => 'Coloración y mechas',
            'image_url' => 'donsexo.jpg',
        ]);

        Employees::create([
            'name'      => 'Destructor de multiversos',
            'role'      => 'Colorista',
            'specialty' => 'Tinte y decoloración',
            'image_url' => 'DonPaquito.webp',
        ]);

        Business::factory()->create();

        User::factory(5)->create();

        CutType::factory(5)->create();

        Booking::factory(20)->create();
    }
}
