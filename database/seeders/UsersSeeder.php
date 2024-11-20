<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
                'name' => 'Johan David Bolaños Muñoz',
                'email' => 'johan@gmail.com',
                'id_persona' => 1,
                'password' => bcrypt('1234567890'),
            ],
        );
        User::create(
            [
                'name' => 'Juan Jose Orozco',
                'email' => 'orozco@gmail.com',
                'id_persona' => 2,
                'password' => bcrypt('1234567890'),
            ],
        );
        User::create(
            [
                'name' => 'Yonier Sebastian Lopez',
                'email' => 'lopez@gmail.com',
                'id_persona' => 3,
                'password' => bcrypt('1234567890'),
            ],
        );
    }
}
