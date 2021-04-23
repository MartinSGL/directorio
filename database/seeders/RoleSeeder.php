<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=>'Administrador']);
        $role2 = Role::create(['name'=>'Secretaria']);
        $role3 = Role::create(['name'=>'Usaer']);
        $role4 = Role::create(['name'=>'Docente']);

        Permission::create(['name'=>'admin.home','description'=>'Ver home'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name'=>'admin.users','description'=>'Administrar usuarios'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.roles','description'=>'Administrar roles'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.alumnos','description'=>'Administrar alumnos'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.usaers','description'=>'Administrar discapacidades'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name'=>'admin.nee','description'=>'Administrar alumnos NEE'])->syncRoles([$role1,$role2,$role3]);

    }
}
