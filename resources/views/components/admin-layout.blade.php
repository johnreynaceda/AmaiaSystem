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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    <!-- Scripts -->

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @wireUiScripts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    @stack('scripts')
</head>

<body class="font-sans antialiased relative">
    <div class="fixed bg-gray-800 top-0 left-0 bottom-0  right-0">
        <img src="{{ asset('images/page_bg.jpg') }}" class="h-full w-full opacity-50 object-cover" alt="">
    </div>
    <div class="flex h-screen overflow-hidden  relative bg-[#1c4c4e] bg-opacity-50">
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64">
                <div class="flex flex-col flex-grow pt-5 overflow-y-auto bg-[#1c4c4e]">
                    <div class="flex flex-col flex-shrink-0 px-4">
                        <a class="text-lg font-semibold flex justify-center items-center tracking-tighter text-black focus:outline-none focus:ring "
                            href="">
                            <img src="{{ asset('images/sidebar_logo.png') }}" class="" alt="">
                        </a>
                        <button class="hidden rounded-lg focus:outline-none focus:shadow-outline">
                            <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="flex flex-shrink-0  px-4 my-6 bg-gray-100">
                        <div @click.away="open = false" class="relative inline-flex items-center w-full"
                            x-data="{ open: false }">
                            <div @click="open = !open"
                                class="inline-flex items-center justify-between w-full px-4 py-5 text-lg font-medium text-center text-white transition duration-500 ease-in-out transform rounded-xl  focus:outline-none focus:ring-2 focus:ring-offset-2 ">
                                <span>
                                    <span class="flex-shrink-0 block group">
                                        <div class="flex items-center">
                                            <div>
                                                <img class="inline-block object-cover rounded-full h-12 w-12"
                                                    src="{{ asset('images/favicon.png') }}" alt="">
                                            </div>
                                            <div class="ml-3 text-left">
                                                <p
                                                    class="text-sm truncate font-bold uppercase text-gray-800 group-hover:text-blue-500">
                                                    {{ auth()->user()->name }}
                                                </p>
                                                <p class="text-xs font-medium text-gray-500 group-hover:text-blue-500">
                                                    Administrator
                                                </p>
                                            </div>
                                        </div>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col flex-grow px-4 relative">
                        <div class="absolute -bottom-20 -left-24">
                            <img src="{{ asset('images/lnwuLogo.png') }}" class="h-96 object-cover opacity-10"
                                alt="">
                        </div>
                        <nav class="flex-1 space-y-1 ">

                            <ul>
                                <li>
                                    <a class="{{ request()->routeIs('admin.dashboard') ? 'bg-white text-[#1c4c4e] fill-[#1c4c4e] scale-95' : 'fill-white text-white ' }} inline-flex items-center w-full px-4 py-1.5 mt-1  transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-[#1c4c4e] hover:fill-[#1c4c4e]"
                                        href="{{ route('admin.dashboard') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M19 21.0001H5C4.44772 21.0001 4 20.5524 4 20.0001V11.0001L1 11.0001L11.3273 1.61162C11.7087 1.26488 12.2913 1.26488 12.6727 1.61162L23 11.0001L20 11.0001V20.0001C20 20.5524 19.5523 21.0001 19 21.0001ZM6 19.0001H18V9.15757L12 3.70302L6 9.15757V19.0001ZM8 15.0001H16V17.0001H8V15.0001Z">
                                            </path>
                                        </svg>
                                        <span class="ml-3 flex-1">
                                            Home
                                        </span>

                                    </a>

                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('admin.requests') ? 'bg-white text-[#1c4c4e] fill-[#1c4c4e] scale-95' : 'fill-white text-white ' }} inline-flex items-center w-full px-4 py-1.5 mt-1 group transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-[#1c4c4e] hover:fill-[#1c4c4e]"
                                        href="{{ route('admin.requests') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M2.00488 9.5V4C2.00488 3.44772 2.4526 3 3.00488 3H21.0049C21.5572 3 22.0049 3.44772 22.0049 4V9.5C20.6242 9.5 19.5049 10.6193 19.5049 12C19.5049 13.3807 20.6242 14.5 22.0049 14.5V20C22.0049 20.5523 21.5572 21 21.0049 21H3.00488C2.4526 21 2.00488 20.5523 2.00488 20V14.5C3.38559 14.5 4.50488 13.3807 4.50488 12C4.50488 10.6193 3.38559 9.5 2.00488 9.5ZM4.00488 7.96776C5.4866 8.70411 6.50488 10.2331 6.50488 12C6.50488 13.7669 5.4866 15.2959 4.00488 16.0322V19H20.0049V16.0322C18.5232 15.2959 17.5049 13.7669 17.5049 12C17.5049 10.2331 18.5232 8.70411 20.0049 7.96776V5H4.00488V7.96776ZM9.00488 9H15.0049V11H9.00488V9ZM9.00488 13H15.0049V15H9.00488V13Z">
                                            </path>
                                        </svg>
                                        <span class="ml-3 flex-1">
                                            Requests
                                        </span>
                                        @php
                                            $maintenance = \App\Models\MaintenanceRequest::where('status', 'pending')->count();
                                            $amenity = \App\Models\AmenityRequest::where('status', 'pending')->count();
                                            $gate = \App\Models\PassRequest::whereHas('pass', function ($record) {
                                                $record->where('name', 'Gate Pass');
                                            })
                                                ->where('status', 'pending')
                                                ->count();
                                            $visitor = \App\Models\PassRequest::whereHas('pass', function ($record) {
                                                $record->where('name', 'Visitor Pass');
                                            })
                                                ->where('status', 'pending')
                                                ->count();

                                            $parcel = \App\Models\PassRequest::whereHas('pass', function ($record) {
                                                $record->where('name', 'Parcel Pass');
                                            })
                                                ->where('status', 'pending')
                                                ->count();

                                            $total_pending = $maintenance + $amenity + $visitor + $parcel + $gate;
                                        @endphp
                                        @if ($total_pending > 0)
                                            <span
                                                class="{{ request()->routeIs('admin.requests') ? 'bg-gray-700 text-white' : 'bg-white' }}  group-hover:bg-gray-700 group-hover:text-white px-2 rounded-md  text-gray-700 font-semibold">{{ $total_pending }}</span>
                                        @endif
                                    </a>
                                </li>
                                {{-- <li>
                                    <a class="{{ request()->routeIs('admin.complaints') ? 'bg-white text-[#1c4c4e] fill-[#1c4c4e] scale-95' : 'fill-white text-white ' }} inline-flex group items-center w-full px-4 py-1.5 mt-1  transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-[#1c4c4e] hover:fill-[#1c4c4e]"
                                        href="{{ route('admin.complaints') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M21 8V20.9932C21 21.5501 20.5552 22 20.0066 22H3.9934C3.44495 22 3 21.556 3 21.0082V2.9918C3 2.45531 3.4487 2 4.00221 2H14.9968L21 8ZM19 9H14V4H5V20H19V9ZM8 7H11V9H8V7ZM8 11H16V13H8V11ZM8 15H16V17H8V15Z">
                                            </path>
                                        </svg>
                                        <span class="ml-3 flex-1">
                                            Complaints
                                        </span>


                                        @if (\App\Models\Complaint::count() > 0)
                                            <span
                                                class="{{ request()->routeIs('admin.complaints') ? 'bg-gray-700 text-white' : 'bg-white' }}  group-hover:bg-gray-700 group-hover:text-white px-2 rounded-md  text-gray-700 font-semibold">
                                                \App\Models\Complaint::count()
                                            </span>
                                        @endif
                                    </a>
                                </li> --}}
                                <li>
                                    <a class="{{ request()->routeIs('admin.announcement') ? 'bg-white text-[#1c4c4e] fill-[#1c4c4e] scale-95' : 'fill-white text-white ' }} inline-flex group items-center w-full px-4 py-1.5 mt-1  transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-[#1c4c4e] hover:fill-[#1c4c4e]"
                                        href="{{ route('admin.announcement') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M9 17C9 17 16 18 19 21H20C20.5523 21 21 20.5523 21 20V13.937C21.8626 13.715 22.5 12.9319 22.5 12C22.5 11.0681 21.8626 10.285 21 10.063V4C21 3.44772 20.5523 3 20 3H19C16 6 9 7 9 7H5C3.89543 7 3 7.89543 3 9V15C3 16.1046 3.89543 17 5 17H6L7 22H9V17ZM11 8.6612C11.6833 8.5146 12.5275 8.31193 13.4393 8.04373C15.1175 7.55014 17.25 6.77262 19 5.57458V18.4254C17.25 17.2274 15.1175 16.4499 13.4393 15.9563C12.5275 15.6881 11.6833 15.4854 11 15.3388V8.6612ZM5 9H9V15H5V9Z">
                                            </path>
                                        </svg>
                                        <span class="ml-3 flex-1">
                                            Announcements
                                        </span>

                                    </a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('admin.messages') ? 'bg-white text-[#1c4c4e] fill-[#1c4c4e] scale-95' : 'fill-white text-white ' }} inline-flex group items-center w-full px-4 py-1.5 mt-1  transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-[#1c4c4e] hover:fill-[#1c4c4e]"
                                        href="{{ route('admin.messages') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M5.45455 15L1 18.5V3C1 2.44772 1.44772 2 2 2H17C17.5523 2 18 2.44772 18 3V15H5.45455ZM4.76282 13H16V4H3V14.3851L4.76282 13ZM8 17H18.2372L20 18.3851V8H21C21.5523 8 22 8.44772 22 9V22.5L17.5455 19H9C8.44772 19 8 18.5523 8 18V17Z">
                                            </path>
                                        </svg>
                                        <span class="ml-3 flex-1">
                                            Messages
                                        </span>

                                        @if (\App\Models\Message::where('receiver_id', auth()->user()->id)->where('read_at', null)->count() > 0)
                                            <span
                                                class="{{ request()->routeIs('admin.messages') ? 'bg-gray-700 text-white' : 'bg-white' }}  group-hover:bg-gray-700 group-hover:text-white px-2 rounded-md  text-gray-700 font-semibold">
                                                {{ \App\Models\Message::where('receiver_id', auth()->user()->id)->where('read_at', null)->count() }}
                                            </span>
                                        @endif

                                    </a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('admin.users') ? 'bg-white text-[#1c4c4e] fill-[#1c4c4e] scale-95' : 'fill-white text-white ' }} inline-flex group items-center w-full px-4 py-1.5 mt-1  transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-[#1c4c4e] hover:fill-[#1c4c4e]"
                                        href="{{ route('admin.users') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M14 14.252V16.3414C13.3744 16.1203 12.7013 16 12 16C8.68629 16 6 18.6863 6 22H4C4 17.5817 7.58172 14 12 14C12.6906 14 13.3608 14.0875 14 14.252ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11ZM17.7929 19.9142L21.3284 16.3787L22.7426 17.7929L17.7929 22.7426L14.2574 19.2071L15.6716 17.7929L17.7929 19.9142Z">
                                            </path>
                                        </svg>
                                        <span class="ml-3 flex-1">
                                            Users
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('admin.unit-owner') ? 'bg-white text-[#1c4c4e] fill-[#1c4c4e] scale-95' : 'fill-white text-white ' }} inline-flex group items-center w-full px-4 py-1.5 mt-1  transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-[#1c4c4e] hover:fill-[#1c4c4e]"
                                        href="{{ route('admin.unit-owner') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M14 14.252V16.3414C13.3744 16.1203 12.7013 16 12 16C8.68629 16 6 18.6863 6 22H4C4 17.5817 7.58172 14 12 14C12.6906 14 13.3608 14.0875 14 14.252ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11ZM17.7929 19.9142L21.3284 16.3787L22.7426 17.7929L17.7929 22.7426L14.2574 19.2071L15.6716 17.7929L17.7929 19.9142Z">
                                            </path>
                                        </svg>
                                        <span class="ml-3 flex-1">
                                            Unit Owner
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('admin.tenant') ? 'bg-white text-[#1c4c4e] fill-[#1c4c4e] scale-95' : 'fill-white text-white ' }} inline-flex group items-center w-full px-4 py-1.5 mt-1  transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-[#1c4c4e] hover:fill-[#1c4c4e]"
                                        href="{{ route('admin.tenant') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M14 14.252V16.3414C13.3744 16.1203 12.7013 16 12 16C8.68629 16 6 18.6863 6 22H4C4 17.5817 7.58172 14 12 14C12.6906 14 13.3608 14.0875 14 14.252ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11ZM17.7929 19.9142L21.3284 16.3787L22.7426 17.7929L17.7929 22.7426L14.2574 19.2071L15.6716 17.7929L17.7929 19.9142Z">
                                            </path>
                                        </svg>
                                        <span class="ml-3 flex-1">
                                            Tenant
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('admin.reports') ? 'bg-white text-[#1c4c4e] fill-[#1c4c4e] scale-95' : 'fill-white text-white ' }} inline-flex group items-center w-full px-4 py-1.5 mt-1  transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-[#1c4c4e] hover:fill-[#1c4c4e]"
                                        href="{{ route('admin.reports') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M21 8V20.9932C21 21.5501 20.5552 22 20.0066 22H3.9934C3.44495 22 3 21.556 3 21.0082V2.9918C3 2.45531 3.4487 2 4.00221 2H14.9968L21 8ZM19 9H14V4H5V20H19V9ZM8 7H11V9H8V7ZM8 11H16V13H8V11ZM8 15H16V17H8V15Z">
                                            </path>
                                        </svg>
                                        <span class="ml-3 flex-1">
                                            Reports
                                        </span>
                                    </a>
                                </li>
                            </ul>
                            <p class="px-4 pt-10 text-xs font-semibold text-gray-200 uppercase">
                                MANAGE
                            </p>
                            <ul>
                                <li>
                                    <a class="{{ request()->routeIs('admin.maintenance') ? 'bg-white text-[#1c4c4e] fill-[#1c4c4e] scale-95' : 'fill-white text-white ' }} inline-flex items-center w-full px-4 py-1.5 mt-1  transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-[#1c4c4e] hover:fill-[#1c4c4e]"
                                        href="{{ route('admin.maintenance') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M2 18H9V20H2V18ZM2 11H11V13H2V11ZM2 4H22V6H2V4ZM20.674 13.0251L21.8301 12.634L22.8301 14.366L21.914 15.1711C21.9704 15.4386 22 15.7158 22 16C22 16.2842 21.9704 16.5614 21.914 16.8289L22.8301 17.634L21.8301 19.366L20.674 18.9749C20.2635 19.3441 19.7763 19.6295 19.2391 19.8044L19 21H17L16.7609 19.8044C16.2237 19.6295 15.7365 19.3441 15.326 18.9749L14.1699 19.366L13.1699 17.634L14.086 16.8289C14.0296 16.5614 14 16.2842 14 16C14 15.7158 14.0296 15.4386 14.086 15.1711L13.1699 14.366L14.1699 12.634L15.326 13.0251C15.7365 12.6559 16.2237 12.3705 16.7609 12.1956L17 11H19L19.2391 12.1956C19.7763 12.3705 20.2635 12.6559 20.674 13.0251ZM18 18C19.1046 18 20 17.1046 20 16C20 14.8954 19.1046 14 18 14C16.8954 14 16 14.8954 16 16C16 17.1046 16.8954 18 18 18Z">
                                            </path>
                                        </svg>
                                        <span class="ml-3">
                                            Maintenance
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('admin.pass') ? 'bg-white text-[#1c4c4e] fill-[#1c4c4e] scale-95' : 'fill-white text-white ' }} inline-flex items-center w-full px-4 py-1.5 mt-1  transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-[#1c4c4e] hover:fill-[#1c4c4e]"
                                        href="{{ route('admin.pass') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M3 18H21V6H3V18ZM1 5C1 4.44772 1.44772 4 2 4H22C22.5523 4 23 4.44772 23 5V19C23 19.5523 22.5523 20 22 20H2C1.44772 20 1 19.5523 1 19V5ZM9 10C9 9.44772 8.55228 9 8 9C7.44772 9 7 9.44772 7 10C7 10.5523 7.44772 11 8 11C8.55228 11 9 10.5523 9 10ZM11 10C11 11.6569 9.65685 13 8 13C6.34315 13 5 11.6569 5 10C5 8.34315 6.34315 7 8 7C9.65685 7 11 8.34315 11 10ZM8.0018 16C7.03503 16 6.1614 16.3907 5.52693 17.0251L4.11272 15.6109C5.10693 14.6167 6.4833 14 8.0018 14C9.52031 14 10.8967 14.6167 11.8909 15.6109L10.4767 17.0251C9.84221 16.3907 8.96858 16 8.0018 16ZM13 9V15H15V9H13ZM17 9V15H19V9H17Z">
                                            </path>
                                        </svg>
                                        <span class="ml-3">
                                            Pass
                                        </span>
                                    </a>
                                </li>

                                <li>
                                    <a class="{{ request()->routeIs('admin.amenities') ? 'bg-white text-[#1c4c4e] fill-[#1c4c4e] scale-95' : 'fill-white text-white ' }} inline-flex items-center w-full px-4 py-1.5 mt-1  transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-[#1c4c4e] hover:fill-[#1c4c4e]"
                                        href="{{ route('admin.amenities') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M21 3C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H21ZM20 5H4V19H20V5ZM8 7V17H6V7H8Z">
                                            </path>
                                        </svg>
                                        <span class="ml-3">
                                            Amenities
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="p-2 relative">
                        <div
                            class="flex flex-col items-start p-3 transition duration-150 ease-in-out bg-gray-100 rounded-xl">
                            <div>
                                <img class="inline-block rounded-full object-cover h-9 w-9"
                                    src="{{ asset('images/favicon.png') }}" alt="">
                            </div>
                            <div>
                                <p class="mt-2 text-base font-bold text-[#1c4c4e]">
                                    AMAIA SKIES
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col flex-1 w-0 overflow-hidden">
            <main class="relative flex-1 overflow-y-auto focus:outline-none">
                <div class="border-b py-3 px-6 z-50 flex sticky top-0 justify-end">
                    <div class="relative flex-shrink-0 ml-5" @click.away="open = false" x-data="{ open: false }">
                        <div>
                            <button @click="open = !open" class="flex space-x-3 items-center group">
                                <img src="{{ asset('images/favicon.png') }}"
                                    class="h-12 w-12 rounded-full object-cover bg-white" alt="">
                                <div class="flex space-x-5 items-center ">
                                    <div class="flex flex-col text-left">
                                        <h1 class="font-bold text-white group-hover:text-gray-100 uppercase">
                                            {{ auth()->user()->name }}</h1>
                                        <span class="leading-3 text-gray-100 text-sm">Administrator</span>
                                    </div>
                                    <div>
                                        <svg :class="{ 'rotate-180': open, 'rotate-0': !open }"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="h-6 w-6 fill-white transition-transform duration-200 transform group-hover:fill-gray-100 rotate-0"">
                                            <path d="M12 16L6 10H18L12 16Z"></path>
                                        </svg>
                                    </div>
                                </div>


                            </button>
                        </div>

                        <div x-show="open" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 z-10 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                            tabindex="-1" style="display: none;">
                            {{-- <a href="#" class="block px-4 py-2 text-sm text-gray-500" role="menuitem"
                                tabindex="-1" id="user-menu-item-0">
                                Your Profile
                            </a>

                            <a href="#" class="block px-4 py-2 text-sm text-gray-500" role="menuitem"
                                tabindex="-1" id="user-menu-item-1">
                                Settings
                            </a> --}}
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="#"
                                    onclick="event.preventDefault();
                                this.closest('form').submit();"
                                    class="block px-4 py-2 text-sm text-gray-500" role="menuitem" tabindex="-1"
                                    id="user-menu-item-2">
                                    Sign out
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="p-10 px-20 ">
                    <div>
                        <header class="font-bold text-2xl uppercase text-white">@yield('title')</header>
                    </div>
                    <div class="mt-5">
                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>
    </div>
    @livewireScripts
</body>

</html>
