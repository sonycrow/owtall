<div>

    <div x-data="ImageGenerator" class="border border-gray-300 p-4 mb-5 rounded-lg flex">
        <div class="mr-4">
            <label>
                <select
                    wire:model.change="faction" {{--x-on:change.debounce="generateImages"--}} class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-1">
                    <option value="">·· Fantasy Factions ··</option>
                    <option value="amazons">Amazons</option>
                    <option value="barbarians">Barbarians</option>
                    <option value="daemons">Daemons</option>
                    <option value="dwarves">Dwarves</option>
                    <option value="elves">Elves</option>
                    <option value="orcs">Orcs</option>
                    <option value="undead">Undead</option>
                </select>
            </label>
        </div>

        <div class="mr-4">
            <label>
                <select wire:model.change="expansion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-1">
                    <option value="">·· Fantasy Expansions ··</option>
                    <option value="heroes">Heroes</option>
                    <option value="inferno">Inferno</option>
                    <option value="mercenaries">Mercenaries</option>
                    <option value="titans">Titans</option>
                </select>
            </label>
        </div>

        <div class="mr-4 border rounded-md px-2"><label><input wire:model="tts" type="checkbox" class="mr-2"/><span>Formato TTS</span></label></div>
        <div class="mr-4 border rounded-md px-2"><label><input x-on:click="download" type="checkbox" class="mr-2"/><span>Descargar imágenes</span></label></div>

        <button x-on:click="generate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 p-1">Generar</button>
    </div>

{{--    {{ $expansion = 'mercenaries' }}--}}

    <div class="grid grid-cols-3" style="width: {{ ($tts ? 288*4 : 512*3) }}px;">
        {{-- Livewire --}}
        @if(empty($expansion))
            @foreach (\App\Providers\UnitServiceProvider::getUnitsByFaction($faction) as $item)
                @livewire('unit', ['id' => $item['id'], 'tts' => $tts], key($item['id']))
            @endforeach
        @else
            @foreach (\App\Providers\UnitServiceProvider::getUnitsByExpansion($expansion) as $item)
                @livewire('unit', ['id' => $item['id'], 'tts' => $tts], key($item['id']))
            @endforeach
        @endif
    </div>
</div>
