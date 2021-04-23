<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Alumno;
use App\Models\Usaer;


class NeeBALiveWire extends Component
{
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
        $alumnos =  Alumno::whereDoesntHave('usaers')
        ->where(DB::raw("CONCAT(apaterno,' ',amaterno,' ',name) "),'LIKE',"%$this->search%")
        ->orderBy('grupo_id','asc')
        ->paginate(40);

        $discapacidades = Usaer::where('name', 'like', '%' . $this->search_d . '%')
        ->latest('id')
        ->paginate(10);

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
