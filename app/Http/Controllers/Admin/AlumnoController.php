<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grupo;

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
}
