<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Alumno;
use App\Models\Usaer;
use Livewire\WithPagination;


class NeeBALiveWire extends Component
{
    use WithPagination;
    public $search, $search_d, $dis_select;
    public $componente_alumno=true; 
    public $valor;
    public $alumno;
    
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $seachL = strtolower($this->search);
        $alumnos =  Alumno::whereDoesntHave('usaers')
        ->where(DB::raw("LOWER(CONCAT(apaterno,' ',amaterno,' ',name)) "),'LIKE',"%$seachL%")
        ->orderBy('grupo_id','asc')
        ->get();

        $seach_dL = strtolower($this->search_d);
        $discapacidades = Usaer::where(DB::raw("LOWER(name)"),'LIKE',"%$seach_dL%")
        ->latest('id')
        ->get();

        $valor = $this->valor;

        $alumno = $this->alumno;

        return view('livewire.admin.nee-b-a-live-wire', compact('alumnos','discapacidades','valor','alumno'));
    }

    public function change_component($valor)
    {
        $this->componente_alumno=false;
        $this->valor = $valor;
    }
   
}
