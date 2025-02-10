<?php

namespace App\Livewire;

use App\Providers\UnitServiceProvider;
use Livewire\Component;

class Unit extends Component
{
    public array $unit;
    public string $tts;

    /**
     * Constructor del componente
     */
    public function mount(string $id, string $tts)
    {
        // Datos de la unidad
        $this->unit = UnitServiceProvider::getUnit($id);
        $this->tts  = $tts;
    }

    /**
     * Vista del componente
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.unit');
    }

}
