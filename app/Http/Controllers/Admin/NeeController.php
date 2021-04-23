<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alumno;


class NeeController extends Controller
{

    public function index(){
        return view('admin.nee.index');
    }

    public function create()
    {
        return view('admin.nee.create');
    }

    public function store(Request $request)
    {
        $request->validate ([
            'clave' => 'required',
            'name' => 'required',
        ],
        ['name.required' => 'Debe escoger al menos una discapacidad']);

        $alumno = Alumno::find($request->clave);
        $alumno->usaers()->sync($request->name);
        return redirect()->route('admin.nee.index')->with('info','Alumno NEE agregado correctamente');
    }

    public function edit($alumno)
    {
        $alumno = Alumno::find($alumno);
        return view('admin.nee.edit',compact('alumno'));
    }

    public function update(Request $request, $alumno)
    {
        $request->validate ([
            'usaers' => 'required'
        ],
        ['usaers.required' => 'Debe escoger al menos una discapacidad']);
        
        $alumno = Alumno::find($alumno);
        $alumno->usaers()->sync($request->usaers);
        return redirect()->route('admin.nee.index')->with('info','Alumno NEE actualizado correctamente');
    }

    public function destroy($alumno)
    {
        $alumno = Alumno::find($alumno);
        $alumno->usaers()->detach($alumno->usaers()->allRelatedIds());
        return redirect()->route('admin.nee.index')->with('info','Alumno NEE eliminado correctamente');
    }
}
