<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php
    $settings = \App\Models\Setting::get();
@endphp

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if ($settings->count() > 0)
        <link rel="shortcut icon" href="{{ Storage::url($settings->first()->favicon_path) }}" />
    @else
        <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
    @endif

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @wireUiScripts
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts
    @stack('scripts')
</head>

<body class="font-sans antialiased relative" x-data="app()">
    <div class="fixed bg-gray-800 top-0 left-0 bottom-0  right-0">
        @if ($settings->count() > 0)
            <img src="{{ Storage::url($settings->first()->background_path) }}"
                class="h-full w-full opacity-50 object-cover" alt="">
        @else
            <img src="{{ asset('images/page_bg.jpg') }}" class="h-full w-full opacity-50 object-cover" alt="">
        @endif
    </div>
    <div>
        <div class="p-5 relative flex justify-center items-center 2xl:hidden">
            @if ($settings->count() > 0)
                <img src="{{ Storage::url($settings->first()->logo_path) }}" class="xl:h-24 h-12 relative z-10"
                    alt="">
            @else
                <img src="{{ asset('images/amaia_logo.png') }}" class="xl:h-24 h-12 relative z-10" alt="">
            @endif
        </div>

        <div class="p-5 relative  2xl:block hidden">
            @if ($settings->count() > 0)
                <img src="{{ Storage::url($settings->first()->logo_path) }}" class="xl:h-24 h-20 relative z-10"
                    alt="">
            @else
                <img src="{{ asset('images/amaia_logo.png') }}" class="xl:h-24 h-20 relative z-10" alt="">
            @endif
        </div>
        <section>


            <div class="2xl:py-10 py-2 relative">
                <div class="mx-auto max-w-7xl 2xl:p-5 p-2">
                    <p class="text-2xl font-black text-center 2xl:text-left tracking-tight text-white sm:text-5xl">
                        REGISTRATION FORM
                    </p>

                    <div class="2xl:mt-6 mt-2 bg-white bg-opacity-80 rounded-xl p-5">
                        <livewire:register-tenant />
                    </div>
                </div>
            </div>
        </section>
    </div>

</body>

</html>
