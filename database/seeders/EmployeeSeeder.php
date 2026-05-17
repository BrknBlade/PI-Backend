<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $employees = [
            ['name' => 'Carlos Ruiz', 'email' => 'carlos@salon.com'],
            ['name' => 'María López', 'email' => 'maria@salon.com'],
            ['name' => 'Javier Martín', 'email' => 'javier@salon.com'],
            ['name' => 'Ana García', 'email' => 'ana@salon.com'],
            ['name' => 'Pedro Sánchez', 'email' => 'pedro@salon.com'],
            ['name' => 'Laura Fernández', 'email' => 'laura@salon.com'],
            ['name' => 'Miguel Torres', 'email' => 'miguel@salon.com'],
            ['name' => 'Sofia Díaz', 'email' => 'sofia@salon.com'],
            ['name' => 'David Romero', 'email' => 'david@salon.com'],
            ['name' => 'Elena Moreno', 'email' => 'elena@salon.com'],
        ];

        foreach ($employees as $emp) {
    DB::table('users')->insertOrIgnore([
        'name' => $emp['name'],
        'email' => $emp['email'],
        'password' => Hash::make('password123'),
        'role' => 3,
        'created_at' => now(),
        'updated_at' => now(),
    ]);
}
    }
}
