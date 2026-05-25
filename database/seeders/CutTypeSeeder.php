<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CutTypeSeeder extends Seeder
{
    public function run(): void
    {
        $cuts = [
            ['name' => 'Corte clásico', 'description' => 'Corte tradicional con tijera', 'duration' => 30, 'price' => 15.00],
            ['name' => 'Corte con navaja', 'description' => 'Acabado fino con navaja', 'duration' => 45, 'price' => 20.00],
            ['name' => 'Degradado', 'description' => 'Fade progresivo a máquina', 'duration' => 40, 'price' => 18.00],
            ['name' => 'Corte y barba', 'description' => 'Corte más arreglo de barba', 'duration' => 60, 'price' => 28.00],
            ['name' => 'Arreglo de barba', 'description' => 'Perfilado y arreglo de barba', 'duration' => 20, 'price' => 12.00],
            ['name' => 'Corte infantil', 'description' => 'Corte para niños hasta 12 años', 'duration' => 25, 'price' => 10.00],
            ['name' => 'Coloración', 'description' => 'Tinte completo de cabello', 'duration' => 90, 'price' => 45.00],
            ['name' => 'Mechas', 'description' => 'Mechas o balayage', 'duration' => 120, 'price' => 60.00],
            ['name' => 'Tratamiento capilar', 'description' => 'Hidratación y nutrición del cabello', 'duration' => 50, 'price' => 35.00],
            ['name' => 'Peinado', 'description' => 'Peinado para eventos o bodas', 'duration' => 60, 'price' => 30.00],
        ];

        foreach ($cuts as $cut) {
            DB::table('cut_types')->insert([
                ...$cut,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
