{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />

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
        <img src="{{ asset('images/page_bg.jpg') }}" class="h-full w-full opacity-50 object-cover" alt="">
    </div>
    <div>
        <div class="p-5 relative flex justify-center items-center 2xl:hidden">
            <img src="{{ asset('images/amaia_logo.png') }}" class="xl:h-24 h-12 relative z-10" alt="">
        </div>

        <div class="p-5 relative  2xl:block hidden">
            <img src="{{ asset('images/amaia_logo.png') }}" class="xl:h-24 h-20 relative z-10" alt="">
        </div>
        <section>
            {{-- <div class="2xl:py-24 py-2 bg-white">
                <div class="relative 2xl:px-8 px-2">
                    <div class="max-w-3xl text-center lg:text-left">
                        <div class="max-w-xl mx-auto text-center lg:p-10 lg:text-left">
                            <div>

                                <p class="text-2xl font-black tracking-tight text-white sm:text-5xl">
                                    REGISTRATION FORM
                                </p>

                            </div>

                            <div class="bg-white bg-opacity-50 2xl:mt-10 mt-5 p-5 rounded-xl">

                            </div>


                        </div>
                    </div>
                </div>
            </div> --}}

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
