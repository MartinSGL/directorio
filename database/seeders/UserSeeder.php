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
            'password' => bcrypt('cambiame')
        ])->assignRole('Administrador');
        User::create([
            'name' => 'Secretaria',
            'email' => 'secretaria@abh.com',
            'password' => bcrypt('cambiame')
        ])->assignRole('Secretaria');
        User::create([
            'name' => 'Usaer',
            'email' => 'usaer@abh.com',
            'password' => bcrypt('cambiame')
        ])->assignRole('Usaer');
        User::create([
            'name' => 'Docente',
            'email' => 'docente@abh.com',
            'password' => bcrypt('cambiame')
        ])->assignRole('Docente');
    }
}
