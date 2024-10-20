<?php

namespace App\Livewire;

use Livewire\Component;

class UnitsGenerator extends Component
{
    public string $faction   = "";
    public string $expansion = "";

    public bool $tts = false;

    /**
     * Vista del componente
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.units-generator');
    }
}
