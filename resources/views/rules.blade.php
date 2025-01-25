<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>OFW tall</title>

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>

    <body>
        {{-- Navbar --}}
        @include('subviews.navbar')

        {{-- Content --}}
        <main class="p-4">
            {{-- Livewire --}}
            @livewire('rules')
        </main>
    </body>

</html>
