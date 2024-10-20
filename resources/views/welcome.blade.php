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
            <h1 class="text-base font-bold underline">
                Laravel 11 TALL
            </h1>
        </main>

{{--        --}}{{-- Footer --}}
{{--        <footer class="py-16 text-center text-sm text-black dark:text-white/70">--}}
{{--            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})--}}
{{--        </footer>--}}
    </body>

</html>
