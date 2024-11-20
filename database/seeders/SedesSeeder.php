<?php

namespace Database\Seeders;

use App\Models\Sede;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SedesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sede::create(
            [
                'nombre_sede' => 'Popayán',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
