<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Alumno;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class NeeLiveWire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search, $grupoS; 
    public $nee_eliminar=0;

    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function render()
    {
        $nee_eliminar = $this->nee_eliminar;
        $alumnos =  Alumno::whereHas('usaers')
        ->where(DB::raw("CONCAT(apaterno,' ',amaterno,' ',name) "),'LIKE',"%$this->search%")
        ->orderBy('grupo_id','asc')
        ->orderBy('apaterno','asc')
        ->paginate(40);


        return view('livewire.admin.nee-live-wire',compact('alumnos','nee_eliminar'));
    }

    public function destroy(Alumno $alumno)
    {
        $this->emit('modal_open');
        $this->nee_eliminar = $alumno;
    }
}
