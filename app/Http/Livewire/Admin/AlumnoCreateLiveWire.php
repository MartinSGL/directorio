<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AlumnoCreateLiveWire extends Component
{
    public function render()
    {
        return view('livewire.admin.alumno-create-live-wire')->layout('layouts.admin.app');
    }
}
