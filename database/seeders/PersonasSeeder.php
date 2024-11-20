<?php

namespace Database\Seeders;

use App\Models\Persona;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Persona::create(
            [
                'primer_nombre' => 'Johan',
                'segundo_nombre' => 'David',
                'primer_apellido' => 'Bolaños',
                'segundo_apellido' => 'Muñoz',
                'identificacion' => '1058667409',
                'fecha_nacimiento' => '2005-04-27',
                'numero_telefono' => '3164964750',
                'id_sede' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
        Persona::create(
            [
                'primer_nombre' => 'Juan',
                'segundo_nombre' => 'Jose',
                'primer_apellido' => 'Orozco',
                'identificacion' => '123456789',
                'fecha_nacimiento' => '0000-00-00',
                'numero_telefono' => '12345879',
                'id_sede' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
        Persona::create(
            [
                'primer_nombre' => 'Yonier',
                'segundo_nombre' => 'Sebastian',
                'primer_apellido' => 'Lopez',
                'identificacion' => '1234567890',
                'fecha_nacimiento' => '0000-00-00',
                'numero_telefono' => '123456789',
                'id_sede' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
