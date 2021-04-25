<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AlumnoRequest;
use App\Models\Grupo;
use App\Models\Alumno;


class AlumnoController extends Controller
{
    public function index()
    {
        return view('admin.alumnos.index');
    }

    public function create()
    {
        $grupos = Grupo::pluck('name','id');
        return view('admin.alumnos.create', compact('grupos'));
    }

    public function store(AlumnoRequest $request)
    {
        //insersión de datos
        $alumno = Alumno::create($request->all());
        return redirect()->route('admin.alumnos.index')->with('info','Alumno agregado correctamente');
        
    }

    public function edit(Alumno $alumno)
    {
        $grupos = Grupo::pluck('name','id');
        return view('admin.alumnos.edit', compact('alumno','grupos'));
    }

    public function update(AlumnoRequest $request, Alumno $alumno)
    {
        $alumno->update($request->all());
        return redirect()->route('admin.alumnos.index')->with('info','Alumno actualizado correctamente');
    }

    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return redirect()->route('admin.alumnos.index')->with('info','Alumno eliminado correctamente');
    }
}
