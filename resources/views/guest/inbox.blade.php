<x-guests-layout>
    {{-- <div class="bg-[#2bb681] border-b-8 border-gray-800 p-4 rounded-t-xl flex justify-between items-center">
        <h1 class="text-2xl font-black text-gray-800">INBOX</h1>
        <div class="flex 2xl:space-x-3  items-center">
            <span class="text-2xs w-32 2xl:text-base 2xl:w-auto">
                Concerns? suggestions? message us.
            </span>
            <button class="relative group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 fill-gray-800 group-hover:fill-blue-500"
                    viewBox="0 0 24 24">
                    <path
                        d="M12.001 2C17.6345 2 22.001 6.1265 22.001 11.7C22.001 17.2735 17.6345 21.4 12.001 21.4C11.0233 21.4023 10.0497 21.273 9.10648 21.0155C8.92907 20.9668 8.7403 20.9808 8.57198 21.055L6.58748 21.931C6.34398 22.0386 6.06291 22.018 5.83768 21.8761C5.61244 21.7342 5.47254 21.4896 5.46448 21.2235L5.40998 19.4445C5.40257 19.2257 5.30547 19.0196 5.14148 18.8745C3.19598 17.1345 2.00098 14.6155 2.00098 11.7C2.00098 6.1265 6.36748 2 12.001 2ZM5.99598 14.5365C5.71398 14.984 6.26398 15.488 6.68498 15.1685L9.84048 12.7735C10.0543 12.6122 10.3491 12.6122 10.563 12.7735L12.8995 14.5235C13.2346 14.7749 13.6596 14.8747 14.0716 14.7987C14.4836 14.7227 14.8451 14.4779 15.0685 14.1235L18.006 9.4635C18.288 9.016 17.738 8.512 17.317 8.8315L14.1615 11.2265C13.9476 11.3878 13.6528 11.3878 13.439 11.2265L11.1025 9.4765C10.7673 9.22511 10.3423 9.12532 9.93034 9.2013C9.51834 9.27728 9.15689 9.5221 8.93348 9.8765L5.99598 14.5365Z">
                    </path>
                </svg>
                <div class="absolute -top-1 -right-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 bg-white rounded-full fill-red-600"
                        viewBox="0 0 24 24">
                        <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path>
                    </svg>
                </div>
            </button>
        </div>
    </div>
    <div class="bg-[#2bb681] flex justify-between items-center ">
        <div class="w-32 2xl:w-auto">
            <x-native-select wire:model="model" class="2xl:h-12 text-sm">
                <option>Select an option</option>
                <option>Read All</option>
                <option>Unopened</option>
                <option>Opened</option>
            </x-native-select>
        </div>
        <div class="w-32 2xl:w-auto">
            <x-input icon="search" class="2xl:h-12 text-sm" placeholder="Search..." />
        </div>
    </div>
    <div class="bg-white 2xl:py-2 2xl:px-4">
        <div class="flex flex-col">
            <div class="flex justify-between items-center border-b 2xl:py-3">
                <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    aria-hidden="true">
                    <path class="fill-red-500"
                        d="M19 8a3 3 0 100-6 3 3 0 000 6zM20.34 12.72h-3.31c-.93 0-1.76.52-2.18 1.34l-.8 1.58c-.19.38-.57.61-.99.61H9.95c-.29 0-.72-.06-.99-.62l-.79-1.57a2.432 2.432 0 00-2.18-1.35H2.66c-.36.01-.66.31-.66.67v3.09C2 19.94 4.07 22 7.53 22h7.96c3.26 0 5.27-1.79 5.51-4.96v-3.66c0-.36-.3-.66-.66-.66z">
                    </path>
                    <path
                        d="M19 9.5c-2.48 0-4.5-2.02-4.5-4.5 0-.72.19-1.39.49-2H7.52C4.07 3 2 5.06 2 8.52v7.95C2 19.94 4.07 22 7.52 22h7.95c3.46 0 5.52-2.06 5.52-5.52V9.01c-.6.3-1.27.49-1.99.49z"
                        opacity=".4"></path>
                </svg>
                <div>
                    <p class="text-xs 2xl:text-base text-center w-40 2xl:w-96 truncate">
                        sdsdk asjhbdsajhd dshjb d hjs hdaskdasjhd sajhdgjhsd hsagdhg sdgjasdjas hjsgdjhasgd agsdjhgas
                        jdas das d
                    </p>
                </div>
                <div class="text-xs 2xl:text-base">
                    10/19/2023
                </div>
            </div>

        </div>
    </div> --}}
    <div>
        <header class="flex space-x-2 items-center font-bold text-xl fill-gray-800 text-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-7 h-7">
                <path
                    d="M4.02381 3.78307C4.12549 3.32553 4.5313 3 5 3H19C19.4687 3 19.8745 3.32553 19.9762 3.78307L21.9762 12.7831C21.992 12.8543 22 12.927 22 13V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V13C2 12.927 2.00799 12.8543 2.02381 12.7831L4.02381 3.78307ZM5.80217 5L4.24662 12H9C9 13.6569 10.3431 15 12 15C13.6569 15 15 13.6569 15 12H19.7534L18.1978 5H5.80217ZM16.584 14C15.8124 15.7659 14.0503 17 12 17C9.94968 17 8.1876 15.7659 7.41604 14H4V19H20V14H16.584Z">
                </path>
            </svg>
            <span>INBOX</span>
        </header>
        <livewire:guest.inbox-list />
    </div>
</x-guests-layout>
