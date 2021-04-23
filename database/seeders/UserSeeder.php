<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Directora',
            'email' => 'directora@abh.com',
            'password' => bcrypt('directora2021alida')
        ])->assignRole('Administrador');
        User::create([
            'name' => 'Secretaria',
            'email' => 'secretaria@abh.com',
            'password' => bcrypt('secretarias2021')
        ])->assignRole('Secretaria');
        User::create([
            'name' => 'Usaer',
            'email' => 'usaer@abh.com',
            'password' => bcrypt('usaer2021nee')
        ])->assignRole('Usaer');
        User::create([
            'name' => 'Docente',
            'email' => 'docente@abh.com',
            'password' => bcrypt('docentesbarbosa')
        ])->assignRole('Docente');
    }
}
