<?php

namespace App\Livewire;

use Livewire\Component;

class LocationsGenerator extends Component
{
    public string $terrain = "";
    public bool $tts = false;

    /**
     * Vista del componente
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.locations-generator');
    }

}
