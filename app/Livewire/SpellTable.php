<?php

namespace App\Livewire;

use App\Providers\SpellServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class SpellTable extends Component
{
    // Propiedades de Datatable
    public array $props = [
        "allowSelection" => false
    ];

    public array $headers = array();
    public array $elements = array();

    /**
     * Constructor del componente
     */
    public function mount()
    {
        $this->loadHeaders();
        $this->loadElements();
    }

    /**
     * Vista del componente
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('livewire.spell-table');
    }

    /**
     * Genera las cabeceras de la tabla
     */
    private function loadHeaders(): void
    {
        $this->headers = array(
            array("key" => "id",        "value" => "ID"),
            array("key" => "name",      "value" => "Name"),
            array("key" => "universe",  "value" => "Universe"),
            array("key" => "faction",   "value" => "Faction"),
            array("key" => "type",      "value" => "Type"),
            array("key" => "mana",      "value" => "Mana"),
            array("key" => "text",      "value" => "Text"),
            array("key" => "exp",       "value" => "Expansion"),
        );
    }

    /**
     * Obtiene los elementos de la tabla y rellena las filas.
     */
    private function loadElements(): void
    {
        // Init
        $this->elements = array();

        // Unidades
        foreach (SpellServiceProvider::getSpells() as $item)
        {
            // TODO Para montar un componente Livewire en el controlador de otro componente, usamos Livewire::mount
            // Livewire::mount('unit', ['id' => $item['id']])->html(),

            // TODO Para las locales
            // $locale = App::currentLocale();
            // if (App::isLocale('en')) {

            $spell = array(
                "id"        => $item['id'],
                "name"      => $item['name'],
                "universe"  => $item['universe'],
                "faction"   => array_key_exists('faction', $item) ? ucfirst($item['faction']) : null,
                "type"      => ucfirst($item['type']),
                "mana"      => $item['mana'] ?? null,
                "text"      => $item['text'],
                "exp"       => ucfirst($item['expansion'])
            );

            // Genera el elemento final
            $this->elements[] = $spell;
        }
    }

}
