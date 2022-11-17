<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SaveDiagram extends Component
{
    protected $listeners = [ "savediagram" ];

    public function savediagram() {
        dd("hola");
    }

    public function render()
    {
        return view('livewire.save-diagram');
    }
}
