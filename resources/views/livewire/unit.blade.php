<div @class([
    "main-counter",
    "main-counter-tts" => !empty($tts),
    "main-counter-tts-{$unit['expansion']}" => !empty($tts),
    "main-counter-tts-{$unit['expansion']}-{$unit['faction']}" => !empty($unit['faction']) && !empty($tts)
    ])>
    <div @class([
         "block-image",
         "counter-tts" => !empty($tts),
         "counter-{$unit['expansion']}",
         "counter-{$unit['expansion']}-{$unit['faction']}" => !empty($unit['faction'])
         ])
         data-blockid="{{ $unit['id'] }}">

        <div @class(['name', 'name-wounded' => $unit['wounded']])>{{ Str::upper($unit['name']) }}</div>

        <div class="line-left"></div>
        <div @class(['cost', 'cost-one' => $unit['cost'] == 1])>{{ $unit['cost'] }}</div>
        <div class="speed">
            @for($i = 1; $i <= $unit['speed']; $i++)
                <div></div>
            @endfor
        </div>
            
        @if ($unit['unique'])
            <div class="unique">*</div>
        @endif
        <div class="terrain terrain-{{ $unit['terrain'] }}"></div>
        <div class="symbol">{{ (isset($unit['symbol']) ? Str::upper($unit['symbol']) : null) }}</div>

        <div class="line-bottom"></div>

        <div @class(['stats', 'stats-wounded' => $unit['wounded']])>{{ $unit['move'] . '-' . $unit['atk'] . '-' . $unit['range'] }}</div>

        <div class="art" style="background-image: url('{{ Vite::asset($unit['art']) }}')"></div>

        @if ($tts)
            <div @class([
                "border-tts",
                "border-tts-{$unit['expansion']}",
                "border-tts-{$unit['expansion']}-{$unit['faction']}" => !empty($unit['faction'])
                ])></div>
        @endif
    </div>

    <div id="block-{{ $unit['id'] }}"></div>
</div>
