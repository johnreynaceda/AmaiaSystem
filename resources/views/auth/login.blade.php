{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
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
            <img src="{{ asset('images/amaia_logo.png') }}" class="xl:h-24 h-20 relative z-10" alt="">
        </div>

        <div class="p-5 relative  2xl:block hidden">
            <img src="{{ asset('images/amaia_logo.png') }}" class="xl:h-24 h-20 relative z-10" alt="">
        </div>
        <section>
            <div class="2xl:py-24 py-10 bg-white">
                <div class="relative px-8">
                    <div class="max-w-3xl text-center lg:text-left">
                        <div class="max-w-xl mx-auto text-center lg:p-10 lg:text-left">
                            <div>
                                <p class="text-2xl font-black tracking-tight text-white sm:text-4xl">
                                    Hello,
                                </p>
                                <p class="text-2xl font-black tracking-tight text-white sm:text-5xl">
                                    Welcome Back!
                                </p>

                            </div>

                            <div
                                class="flex flex-col items-center mb-5 justify-center gap-3 mt-10 2xl:mt-16 lg:flex-row lg:justify-start">
                                <p class="text-gray-300">Please enter your Amaia account.</p>

                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="flex flex-col space-y-5">
                                    <x-input class="2xl:h-12 " icon="user" placeholder="Email address" name="email"
                                        :value="old('email')" required autofocus autocomplete="username" />
                                    <x-inputs.password class="2xl:h-12 " icon="key" placeholder="Password"
                                        name="password" required autocomplete="current-password" />

                                </div>

                                <div class="flex justify-between items-center">
                                    <x-primary-button class="my-5">
                                        {{ __('Sign In') }}
                                    </x-primary-button>
                                    @if (Route::has('password.request'))
                                        <a class="underline text-sm text-white hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                            href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif
                                </div>

                            </form>
                            <div class="relative">
                                <div class="absolute inset-0 flex items-center">
                                    <div class="w-full border-t-2 border-gray-300"></div>
                                </div>
                            </div>
                            <div class="text-right my-5">
                                <span class="text-sm 2xl:text-md">Don't Have an Account? <a
                                        href="{{ route('register') }}"
                                        class="text-white hover:text-cyan-500 2xl:hover:text-main">Register
                                        here.</a></span>
                            </div>

                            <div class="text-left">
                                <span class="text-sm text-gray-200 2xl:text-md">Visiting? Please select and Fill up
                                    the form
                                    provided.</span>
                                <div class="mt-3 flex space-x-3 justify-center 2xl:justify-start items-center">
                                    <livewire:pass-request />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</body>

</html>
