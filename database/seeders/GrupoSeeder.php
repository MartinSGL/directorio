<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grupo;

class GrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grupo::create([
            'name' => '1A',
        ]);
        Grupo::create([
            'name' => '1B',
        ]);
        Grupo::create([
            'name' => '1C',
        ]);
        Grupo::create([
            'name' => '1D',
        ]);
        Grupo::create([
            'name' => '2A',
        ]);
        Grupo::create([
            'name' => '2B',
        ]);
        Grupo::create([
            'name' => '2C',
        ]);
        Grupo::create([
            'name' => '2D',
        ]);
        Grupo::create([
            'name' => '3A',
        ]);
        Grupo::create([
            'name' => '3B',
        ]);
        Grupo::create([
            'name' => '3C',
        ]);
        Grupo::create([
            'name' => '3D',
        ]);
    }
}
