<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Alumno;
use App\Models\Grupo;
use App\Models\Usaer;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class UsaerLiveWire extends Component
{
    use WithPagination;
    public $search, $salon, $open = false;
    public $name, $body;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $name = $this->name;
        $body = $this->body;
        $seachL = strtolower($this->search);
        $alumnos =  Alumno::whereHas('usaers')
        ->where(DB::raw("LOWER(CONCAT(apaterno,' ',amaterno,' ',name)) "),'LIKE',"%$seachL%")->Where('grupo_id', 'like', '%' . $this->salon . '%')
        ->orderBy('grupo_id','asc')
        ->orderBy('apaterno','asc')
        ->paginate(40);

        $grupos = Grupo::all();

        return view('livewire.usaer-live-wire', compact('alumnos','grupos','name','body'));
    }

    public function getInfo($id)
    {
        $discapacidad = Usaer::where('id',$id)->first();
        $this->name = $discapacidad->name;
        $this->body = $discapacidad->body;
        $this->open = true;
    }

    public function init()
    {
        $this->open = false;
    }
}
