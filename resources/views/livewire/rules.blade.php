<div>
    <textarea id="rules-md" class="hidden">{{ $rules }}</textarea>
    <div id="rules-html" class="markdown"></div>
</div>

@script
<script>
    document.getElementById('rules-html').innerHTML = markdownit.render(document.getElementById('rules-md').value);
</script>
@endscript
