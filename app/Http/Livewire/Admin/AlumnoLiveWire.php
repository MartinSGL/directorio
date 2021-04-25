<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Alumno;
use App\Models\Grupo;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class AlumnoLiveWire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search, $grupoS; 
    public $alumno_eliminar=['id'=>0,'apaterno'=>'inicial','amaterno'=>'inicial','name'=>'inicial'];
   

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $seachL = strtolower($this->search);
        $alumnos =  Alumno::where(DB::raw("LOWER(CONCAT(apaterno,' ',amaterno,' ',name)) "),'LIKE',"%$seachL%")
        ->Where('grupo_id', 'like', '%' . $this->grupoS . '%')
        ->orderBy('grupo_id','asc')
        ->orderBy('apaterno','asc')
        ->paginate(40);

        $grupos = Grupo::all();
        return view('livewire.admin.alumno-live-wire',compact('alumnos','grupos'));
    }

    public function destroy(Alumno $alumno)
    {
        $this->alumno_eliminar = $alumno;
        $this->emit('modal_open');    
    }
}
