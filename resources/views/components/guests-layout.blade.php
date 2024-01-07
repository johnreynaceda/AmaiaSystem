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
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    @wireUiScripts
    <!-- Scripts -->
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts

</head>

<body class="font-sans antialiased relative" x-data="app()">
    <div class="fixed bg-gray-800 top-0 left-0 bottom-0  right-0">
        <img src="{{ asset('images/page_bg.jpg') }}" class="h-full w-full opacity-50 object-cover" alt="">
    </div>
    <div x-data="{ accept: {{ auth()->user()->is_accepted == true ? 'false' : 'true' }} }">
        <div class="bg-white relative border-b w-full">
            <div class=" mx-auto  2xl:max-w-7xl">
                <div x-data="{ open: false }"
                    class="relative flex flex-col w-full p-3 mx-auto bg-white  md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
                    <div class="flex flex-row items-center justify-between lg:justify-start">
                        <a class="text-lg tracking-tight text-black uppercase focus:outline-none focus:ring lg:text-2xl"
                            href="/">
                            <img src="{{ asset('images/amaia_logo.png') }}" class="h-8" alt="">
                        </a>
                        <div class="flex space-x-1 items-center">
                            <a href="{{ route('guest.inbox') }}" class="2xl:hidden relative  group">
                                <div class="absolute -top-2 -left-2">
                                    <livewire:inbox-count />
                                </div>
                                <svg class="w-8 h-8 group-hover:text-red-500 text-[#1c4c4e]"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true">
                                    <path
                                        d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81v8.37C2 19.83 4.17 22 7.81 22h8.37c3.64 0 5.81-2.17 5.81-5.81V7.81C22 4.17 19.83 2 16.19 2z"
                                        opacity=".4"></path>
                                    <path
                                        d="M21.3 12.23h-3.48c-.98 0-1.85.54-2.29 1.42l-.84 1.66c-.2.4-.6.65-1.04.65h-3.28c-.31 0-.75-.07-1.04-.65l-.84-1.65a2.567 2.567 0 00-2.29-1.42H2.7c-.39 0-.7.31-.7.7v3.26C2 19.83 4.18 22 7.82 22h8.38c3.43 0 5.54-1.88 5.8-5.22v-3.85c0-.38-.31-.7-.7-.7z">
                                    </path>
                                </svg>
                            </a>
                            {{-- <a class="md:hidden">
                            <svg class="w-9 h-9 text-[#1C4C4E]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor" aria-hidden="true">
                                <path
                                    d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81v8.37C2 19.83 4.17 22 7.81 22h8.37c3.64 0 5.81-2.17 5.81-5.81V7.81C22 4.17 19.83 2 16.19 2z"
                                    opacity=".4"></path>
                                <path
                                    d="M21.3 12.23h-3.48c-.98 0-1.85.54-2.29 1.42l-.84 1.66c-.2.4-.6.65-1.04.65h-3.28c-.31 0-.75-.07-1.04-.65l-.84-1.65a2.567 2.567 0 00-2.29-1.42H2.7c-.39 0-.7.31-.7.7v3.26C2 19.83 4.18 22 7.82 22h8.38c3.43 0 5.54-1.88 5.8-5.22v-3.85c0-.38-.31-.7-.7-.7zM13.55 7.8h-3.1c-.39 0-.7-.31-.7-.7 0-.39.31-.7.7-.7h3.1c.39 0 .7.31.7.7 0 .39-.32.7-.7.7zM14.33 10.59H9.67c-.39 0-.7-.31-.7-.7 0-.39.31-.7.7-.7h4.65c.39 0 .7.31.7.7 0 .39-.31.7-.69.7z">
                                </path>
                            </svg>
                        </a> --}}
                            <button @click="open = !open"
                                class="inline-flex items-center justify-center p-2 text-gray-400 hover:text-black focus:outline-none focus:text-black md:hidden">
                                <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"></path>
                                    <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <nav :class="{ 'flex': open, 'hidden': !open }"
                        class="flex-col items-center border-t  2xl:border-0 hidden  flex-grow  md:pb-0 md:flex md:justify-end md:flex-row">


                        <div class="inline-flex items-center mt-3 2xl:mt-0 gap-2 list-none lg:ml-auto">
                            <a href="{{ route('guest.inbox') }}" class="2xl:block relative hidden group">
                                <div class="absolute -top-2 -left-2">
                                    @if (\App\Models\Message::where('receiver_id', auth()->user()->id)->whereNull('read_at')->count() > 0)
                                        <x-badge
                                            label="{{ \App\Models\Message::where('receiver_id', auth()->user()->id)->whereNull('read_at')->count() }}"
                                            2xs negative />
                                    @endif
                                </div>
                                <svg class="w-8 h-8 group-hover:text-red-500 text-[#1c4c4e]"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true">
                                    <path
                                        d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81v8.37C2 19.83 4.17 22 7.81 22h8.37c3.64 0 5.81-2.17 5.81-5.81V7.81C22 4.17 19.83 2 16.19 2z"
                                        opacity=".4"></path>
                                    <path
                                        d="M21.3 12.23h-3.48c-.98 0-1.85.54-2.29 1.42l-.84 1.66c-.2.4-.6.65-1.04.65h-3.28c-.31 0-.75-.07-1.04-.65l-.84-1.65a2.567 2.567 0 00-2.29-1.42H2.7c-.39 0-.7.31-.7.7v3.26C2 19.83 4.18 22 7.82 22h8.38c3.43 0 5.54-1.88 5.8-5.22v-3.85c0-.38-.31-.7-.7-.7z">
                                    </path>
                                </svg>
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-button
                                    onclick="event.preventDefault();
                            this.closest('form').submit();"
                                    label="Logout" />
                            </form>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="relative bg-white hidden 2xl:block mx-auto max-w-7xl rounded-b-2xl p-5 px-10">
            <div class="flex justify-between">
                <a href="{{ route('guest.dashboard') }}"
                    class="{{ request()->routeIs('guest.dashboard') ? 'text-[#1c4c4e] font-semibold underline' : 'text-gray-700' }} font-medium  hover:text-[#1c4c4e] hover:font-semibold">Home</a>
                <a href="{{ route('guest.profile') }}"
                    class="{{ request()->routeIs('guest.profile') ? 'text-[#1c4c4e] font-semibold underline' : 'text-gray-700' }} font-medium  hover:text-[#1c4c4e] hover:font-semibold">My
                    Profile</a>
                <a href="{{ route('guest.requests') }}"
                    class="{{ request()->routeIs('guest.requests') ? 'text-[#1c4c4e] font-semibold underline' : 'text-gray-700' }} font-medium  hover:text-[#1c4c4e] hover:font-semibold">Requests</a>
                <a href="{{ route('guest.announcement') }}"
                    class="{{ request()->routeIs('guest.announcement') ? 'text-[#1c4c4e] font-semibold underline' : 'text-gray-700' }} font-medium text-gray-700 hover:text-[#1c4c4e] hover:font-semibold">Announcements</a>
                <a href="{{ route('guest.contact') }}"
                    class="{{ request()->routeIs('guest.announcement') ? 'text-[#1c4c4e] font-semibold underline' : 'text-gray-700' }} font-medium  hover:text-[#1c4c4e] hover:font-semibold">Contact</a>
                <a href="{{ route('guest.about') }}"
                    class=" {{ request()->routeIs('guest.about') ? 'text-[#1c4c4e] font-semibold underline' : 'text-gray-700' }} font-medium text-gray-700 hover:text-[#1c4c4e] hover:font-semibold">About</a>
            </div>
        </div>
        <div class="relative p-2 py-5 mx-auto 2xl:max-w-7xl">
            <div class="bg-white bg-opacity-80 rounded-lg p-4 mb-20">
                <header class="2xl:text-3xl uppercase text-[#1c4c4e] text-xl font-bold">@yield('title')</header>
                <div class="mt-5">
                    {{ $slot }}
                </div>
            </div>
        </div>
        <div class="fixed 2xl:hidden bottom-0 left-0 right-0  pb-2 px-2 ">
            <div class="py-2 rounded-2xl bg-gray-600 bg-opacity-90   grid grid-cols-5 gap-2 px-2">
                <a href="{{ route('guest.dashboard') }}"
                    class=" {{ request()->routeIs('guest.dashboard') ? 'bg-white text-[#1c4c4e]' : 'text-white ' }} hover:bg-white hover:text-[#1c4c4e] rounded-3xl grid place-content-center h-14">
                    <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        aria-hidden="true">
                        <path
                            d="M10.07 2.82L3.14 8.37c-.78.62-1.28 1.93-1.11 2.91l1.33 7.96c.24 1.42 1.6 2.57 3.04 2.57h11.2c1.43 0 2.8-1.16 3.04-2.57l1.33-7.96c.16-.98-.34-2.29-1.11-2.91l-6.93-5.54c-1.07-.86-2.8-.86-3.86-.01z"
                            opacity=".4"></path>
                        <path d="M12 15.5a2.5 2.5 0 100-5 2.5 2.5 0 000 5z"></path>
                    </svg>
                </a>
                <a href="{{ route('guest.profile') }}"
                    class="{{ request()->routeIs('guest.profile') ? 'bg-white text-[#1c4c4e]' : 'text-white ' }} hover:bg-white hover:text-[#1c4c4e] rounded-3xl grid place-content-center h-14">
                    <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        aria-hidden="true">
                        <path
                            d="M9 2C6.38 2 4.25 4.13 4.25 6.75c0 2.57 2.01 4.65 4.63 4.74.08-.01.16-.01.22 0h.07a4.738 4.738 0 004.58-4.74C13.75 4.13 11.62 2 9 2z"
                            opacity=".4"></path>
                        <path
                            d="M14.08 14.15c-2.79-1.86-7.34-1.86-10.15 0-1.27.85-1.97 2-1.97 3.23s.7 2.37 1.96 3.21C5.32 21.53 7.16 22 9 22c1.84 0 3.68-.47 5.08-1.41 1.26-.85 1.96-1.99 1.96-3.23-.01-1.23-.7-2.37-1.96-3.21z">
                        </path>
                        <path
                            d="M19.99 7.34c.16 1.94-1.22 3.64-3.13 3.87h-.05c-.06 0-.12 0-.17.02-.97.05-1.86-.26-2.53-.83 1.03-.92 1.62-2.3 1.5-3.8a4.64 4.64 0 00-.77-2.18 3.592 3.592 0 015.15 2.92z"
                            opacity=".4"></path>
                        <path
                            d="M21.99 16.59c-.08.97-.7 1.81-1.74 2.38-1 .55-2.26.81-3.51.78.72-.65 1.14-1.46 1.22-2.32.1-1.24-.49-2.43-1.67-3.38-.67-.53-1.45-.95-2.3-1.26 2.21-.64 4.99-.21 6.7 1.17.92.74 1.39 1.67 1.3 2.63z">
                        </path>
                    </svg>
                </a>
                <a href="{{ route('guest.requests') }}"
                    class="{{ request()->routeIs('guest.requests') ? 'bg-white text-[#1c4c4e]' : 'text-white ' }} hover:bg-white hover:text-[#1c4c4e] rounded-3xl grid place-content-center h-14">
                    <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="currentColor" aria-hidden="true">
                        <path
                            d="M22 6v2.42C22 10 21 11 19.42 11H16V4.01c0-1.11.91-2.02 2.02-2.01 1.09.01 2.09.45 2.81 1.17C21.55 3.9 22 4.9 22 6z">
                        </path>
                        <path
                            d="M2 7v14c0 .83.94 1.3 1.6.8l1.71-1.28c.4-.3.96-.26 1.32.1l1.66 1.67c.39.39 1.03.39 1.42 0l1.68-1.68c.35-.35.91-.39 1.3-.09l1.71 1.28c.66.49 1.6.02 1.6-.8V4c0-1.1.9-2 2-2H6C3 2 2 3.79 2 6v1z"
                            opacity=".4"></path>
                        <path
                            d="M12 12.26H9c-.41 0-.75.34-.75.75s.34.75.75.75h3c.41 0 .75-.34.75-.75s-.34-.75-.75-.75zM9 9.76h3c.41 0 .75-.34.75-.75s-.34-.75-.75-.75H9c-.41 0-.75.34-.75.75s.34.75.75.75zM5.97 8.01c-.56 0-1 .45-1 1s.45 1 1 1 1-.45 1-1-.45-1-1-1zM5.97 12.01c-.56 0-1 .45-1 1s.45 1 1 1 1-.45 1-1-.45-1-1-1z">
                        </path>
                    </svg>
                </a>
                <a href="{{ route('guest.announcement') }}"
                    class="{{ request()->routeIs('guest.announcement') ? 'bg-white text-[#1c4c4e]' : 'text-white ' }} hover:bg-white hover:text-[#1c4c4e] rounded-3xl grid place-content-center h-14">
                    <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="currentColor" aria-hidden="true">
                        <path d="M19 8a3 3 0 100-6 3 3 0 000 6z"></path>
                        <path
                            d="M19 9.5c-2.48 0-4.5-2.02-4.5-4.5 0-.72.19-1.39.49-2H7.52C4.07 3 2 5.06 2 8.52v7.95C2 19.94 4.07 22 7.52 22h7.95c3.46 0 5.52-2.06 5.52-5.52V9.01c-.6.3-1.27.49-1.99.49z"
                            opacity=".4"></path>
                        <path
                            d="M11.75 14h-5c-.41 0-.75-.34-.75-.75s.34-.75.75-.75h5c.41 0 .75.34.75.75s-.34.75-.75.75zM15.75 18h-9c-.41 0-.75-.34-.75-.75s.34-.75.75-.75h9c.41 0 .75.34.75.75s-.34.75-.75.75z">
                        </path>
                    </svg>
                </a>
                <a href="{{ route('guest.about') }}"
                    class="{{ request()->routeIs('guest.about') ? 'bg-white text-[#1c4c4e]' : 'text-white ' }} hover:bg-white hover:text-[#1c4c4e] rounded-3xl grid place-content-center h-14">
                    <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="currentColor" aria-hidden="true">
                        <path
                            d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81v8.37C2 19.83 4.17 22 7.81 22h8.37c3.64 0 5.81-2.17 5.81-5.81V7.81C22 4.17 19.83 2 16.19 2z"
                            opacity=".4"></path>
                        <path
                            d="M21.3 12.23h-3.48c-.98 0-1.85.54-2.29 1.42l-.84 1.66c-.2.4-.6.65-1.04.65h-3.28c-.31 0-.75-.07-1.04-.65l-.84-1.65a2.567 2.567 0 00-2.29-1.42H2.7c-.39 0-.7.31-.7.7v3.26C2 19.83 4.18 22 7.82 22h8.38c3.43 0 5.54-1.88 5.8-5.22v-3.85c0-.38-.31-.7-.7-.7zM13.55 7.8h-3.1c-.39 0-.7-.31-.7-.7 0-.39.31-.7.7-.7h3.1c.39 0 .7.31.7.7 0 .39-.32.7-.7.7zM14.33 10.59H9.67c-.39 0-.7-.31-.7-.7 0-.39.31-.7.7-.7h4.65c.39 0 .7.31.7.7 0 .39-.31.7-.69.7z">
                        </path>
                    </svg>
                </a>

            </div>
        </div>

        <div x-show="accept" x-cloak class="relative z-10" aria-labelledby="modal-title" role="dialog"
            aria-modal="true">
            <!--
              Background backdrop, show/hide based on modal state.

              Entering: "ease-out duration-300"
                From: "opacity-0"
                To: "opacity-100"
              Leaving: "ease-in duration-200"
                From: "opacity-100"
                To: "opacity-0"
            -->
            <div x-show="accept" x-cloak class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <!--
                  Modal panel, show/hide based on modal state.

                  Entering: "ease-out duration-300"
                    From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    To: "opacity-100 translate-y-0 sm:scale-100"
                  Leaving: "ease-in duration-200"
                    From: "opacity-100 translate-y-0 sm:scale-100"
                    To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                -->
                    <div x-show="accept" x-cloak
                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div
                                    class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                    <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                    <h3 class="text-base font-semibold uppercase leading-6 text-gray-900"
                                        id="modal-title">
                                        Your Account has not been Accepted</h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">Please wait for administrator to verify your
                                            account. try again later. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @stack('scripts')
</body>

</html>
