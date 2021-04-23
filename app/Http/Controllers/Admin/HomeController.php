<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Models\Grupo;

class HomeController extends Controller
{
    public function index()
    {
        $grupos = Grupo::all();
        $alumnos_usaer = Alumno::whereHas('usaers')->get();
        return view('admin.index', compact('grupos','alumnos_usaer'));
    }
}
