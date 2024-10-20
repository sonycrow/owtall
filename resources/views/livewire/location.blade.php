<div class="main-card">
    <div @class([
         "block-image",
         "card-location",
         "card-location-{$location['terrain']}" => !empty($location['terrain'])
         ])
         data-blockid="{{ $location['id'] }}">

        <div class="art" style="background-image: url('{{ Vite::asset($location['art']) }}')"></div>

        <div class="name">{{ $location['name'] }}</div>

        @if($location['gold'])
            <div @class(["gold", "one" => $location['gold'] == 1])>{{ $location['gold'] }}</div>
        @endif
        @if($location['mana'])
            <div @class(["mana", "one" => $location['mana'] == 1])>{{ $location['mana'] }}</div>
        @endif

        @if($location['text'])
            <div class="type">{{ Str::upper(__('general.location')) }}</div>
            <div class="text">
                <div class="terrain-icon"></div>
                <div class="desc" data-desc>{{ $location['text'] }}</div>
                <div class="lore"><div>{{ $location['lore'] }}</div></div>
            </div>
        @endif

        <div class="terrain"></div>
        <div @class(["entrance", "entrance-one" => $location['entrance'] == 1])>{{ $location['entrance'] }}</div>
    </div>

    <div id="block-{{ $location['id'] }}"></div>
</div>

@script
<script>
    let element = $wire.$el.querySelector('[data-desc]');

    if (element) {
        element.innerHTML = element.innerHTML
            .replaceAll(/\{(.*?)\|(.*?)}/gmi, "<span class='keyword keyword-$1'>$2</span>")
            .replaceAll(/\[(.*?)]/gmi, "<span class='keyword-icon keyword-icon-$1'>&nbsp;&nbsp;</span>")
            .replaceAll(/\((.*?)m\)/gmi, "<span class='mana'>$1</span>")
            .replaceAll(/\*(.*?)\*/gmi, "<span class='bold'>$1</span>")
            .replaceAll(/\+/gmi, "<span class='plus'>+</span>")
            .replaceAll(/\\n/gmi, "<br/>")
    }
</script>
@endscript
