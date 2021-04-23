<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Grupo;
use App\Models\Alumno;

class ResumenLiveWire extends Component
{
    public function render()
    {
        $grupos = Grupo::all();
        $alumnos_usaer = Alumno::whereHas('usaers')->get();
        return view('livewire.resumen-live-wire', compact('grupos','alumnos_usaer'));
    }
}
