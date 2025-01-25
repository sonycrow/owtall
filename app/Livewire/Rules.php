<?php

namespace App\Livewire;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Rules extends Component
{
    public string $rules;

    /**
     * Constructor del componente
     */
    public function mount()
    {
        $this->rules = html_entity_decode(Storage::disk('public')->get("rules/rules_" . App::currentLocale() . ".md"));
    }

    /**
     * Vista del componente
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.rules');
    }

}
