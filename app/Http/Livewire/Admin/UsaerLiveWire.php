<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Usaer;
use Livewire\WithPagination;


class UsaerLiveWire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search, $name, $body, $usaer_id;

    protected $rules = [
        'name' => 'required',
        'body' => 'required',
    ];

    protected $messages = [
        'name.required' => 'El campo nombre es requerido',
        'body.required' => 'El campo descripción es requerido'
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        $name = $this->name;
        $body = $this->body;
        $usaer_id = $this->usaer_id;

        $usaers = Usaer::where('name', 'like', '%' . $this->search . '%')
        ->orWhere('body', 'like', '%' . $this->search . '%')
        ->latest('id')
        ->paginate(5);

        return view('livewire.admin.usaer-live-wire', compact('usaers','name','body','usaer_id'))->layout('layouts.admin.app');
    }

    public function store()
    {
        $this->validate();
        Usaer::create([
            'name' => $this->name,
            'body' => $this->body
        ]);

        $this->reset(['name','body','usaer_id']);
        $this->emit('confirm','Discapasidad agregada con éxito');
        
    }

    public function edit(Usaer $usaer)
    {
        $this->resetValidation();
        $this->name = $usaer->name;
        $this->body = $usaer->body;
        $this->usaer_id = $usaer->id;

    }

    public function update(Usaer $usaer)
    {
        $this->validate();

        $usaer->update([
            'name'=>$this->name,
            'body'=>$this->body
        ]);

        $this->reset(['name','body','usaer_id']);
        $this->emit('confirm','Discapasidad actualizada con éxito');
    }

    public function delete(Usaer $usaer)
    {
        $this->name = $usaer->name;
        $this->usaer_id = $usaer->id;
    }

    public function destroy(Usaer $usaer)
    {
        $usaer->delete();
        $this->emit('confirm', 'Discapasidad eliminada con éxito');
    }

    public function resetM()
    {
        $this->reset(['name','body']);
        $this->resetValidation();
    }

}
