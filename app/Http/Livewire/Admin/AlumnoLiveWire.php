<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AlumnoLiveWire extends Component
{
    public function render()
    {
        return view('livewire.admin.alumno-live-wire')->layout('layouts.admin.app');
    }
}
