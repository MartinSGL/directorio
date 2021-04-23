<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
   
    public function index()
    {
        $roles = Role::all();
        $permisos = Permission::all();
        return view('admin.roles.index',compact('roles','permisos'));
    }

    public function store(Request $request)
    {
        $roles = Role::all();
        foreach ($roles as $role) {
            $role->permissions()->sync($request[$role->name]);
        }
       return redirect()->route('admin.roles.index')->with('info','Permisos actualizados correctamente');
    }


}
