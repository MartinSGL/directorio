<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Alumno;
use App\Models\Grupo;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class AlumnoLiveWire extends Component
{
    use WithPagination;
    public $search, $salon;
    
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $seachL = strtolower($this->search);
        $alumnos =  Alumno::where(DB::raw("CONCAT(apaterno,' ',amaterno,' ',name) "),'LIKE',"%$seachL%")->Where('grupo_id', 'like', '%' . $this->salon . '%')
        ->orWhere('numero', 'like',  $this->search . '%')->Where('grupo_id', 'like', '%' . $this->salon . '%')
        ->orWhere('numero_tutor', 'like',  $this->search . '%')->Where('grupo_id', 'like', '%' . $this->salon . '%')
        ->orderBy('grupo_id','asc')
        ->orderBy('apaterno','asc')
        ->paginate(40);

        $grupos = Grupo::all();
        return view('livewire.alumno-live-wire',compact('alumnos','grupos'));
    }
}
