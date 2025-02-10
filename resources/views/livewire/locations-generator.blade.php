<div>

    <div x-data="ImageGenerator" class="border border-gray-300 p-4 mb-5 rounded-lg flex">
        <div class="mr-4">
            <label>
                <select wire:model="terrain"
                        wire:model.change="terrain"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-1">
                    <option value="">·· Fantasy Locations ··</option>
                    <option value="city">City</option>
                    <option value="desert">Desert</option>
                    <option value="forest">Forest</option>
                    <option value="mountain">Mountain</option>
                    <option value="plains">Plains</option>
                    <option value="water">Water</option>
                </select>
            </label>
        </div>

        <div class="mr-4 border rounded-md px-2"><label><input x-on:click="download" type="checkbox" class="mr-1"/><span>Descargar imágenes</span></label></div>

        <button x-on:click="generate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 p-1">Generar</button>
    </div>

    <div class="grid grid-cols-2" style="width: {{ 756*2 }}px;">
        {{-- Livewire --}}
        @foreach (\App\Providers\LocationServiceProvider::getLocationsByTerrain($terrain) as $item)
            @livewire('location', ['id' => $item['id']], key($item['id']))
        @endforeach
    </div>

</div>
