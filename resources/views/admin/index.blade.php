@section('title', 'HOME')
<x-admin-layout>
    <div>
        <div class="grid grid-cols-4 gap-5">
            <a href="{{ route('admin.users') }}"
                class="border-2 cursor-pointer border-main bg-gray-100 rounded-xl relative overflow-hidden group p-6">
                <div class="flex justify-end">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6 fill-gray-500 ">
                        <path
                            d="M14 14.252V16.3414C13.3744 16.1203 12.7013 16 12 16C8.68629 16 6 18.6863 6 22H4C4 17.5817 7.58172 14 12 14C12.6906 14 13.3608 14.0875 14 14.252ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11ZM17.7929 19.9142L21.3284 16.3787L22.7426 17.7929L17.7929 22.7426L14.2574 19.2071L15.6716 17.7929L17.7929 19.9142Z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-main text-3xl">{{ App\Models\User::where('is_accepted', true)->count() }}
                    </p>
                    <p class="mt-1 text-gray-500">Total Registered User</p>
                </div>
                <div class="absolute -bottom-2 -right-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        class="h-20 opacity-20 group-hover:opacity-50 fill-main">
                        <path
                            d="M13 14.0619V22H4C4 17.5817 7.58172 14 12 14C12.3387 14 12.6724 14.021 13 14.0619ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM17.7929 19.9142L21.3284 16.3787L22.7426 17.7929L17.7929 22.7426L14.2574 19.2071L15.6716 17.7929L17.7929 19.9142Z">
                        </path>
                    </svg>
                </div>
            </a>
            <a href="{{ route('admin.unit-owner') }}"
                class="border-2 cursor-pointer border-main bg-gray-100 rounded-xl relative overflow-hidden group p-6">
                <div class="flex justify-end">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6 fill-gray-500  ">
                        <path
                            d="M20 22H18V20C18 18.3431 16.6569 17 15 17H9C7.34315 17 6 18.3431 6 20V22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22ZM12 13C8.68629 13 6 10.3137 6 7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7C18 10.3137 15.3137 13 12 13ZM12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-main text-3xl">
                        {{ App\Models\User::where('is_accepted', true)->whereHas('user_information', function ($record) {
                                $record->where('resident_type', 'Unit Owner');
                            })->count() }}
                    </p>
                    <p class="mt-1 text-gray-500">Total Unit Owner</p>
                </div>
                <div class="absolute -bottom-2 -right-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        class="h-20 opacity-20 group-hover:opacity-50 fill-main">
                        <path
                            d="M20 22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22ZM12 13C8.68629 13 6 10.3137 6 7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7C18 10.3137 15.3137 13 12 13Z">
                        </path>
                    </svg>
                </div>
            </a>
            <a href="{{ route('admin.tenant') }}"
                class="border-2 cursor-pointer border-main bg-gray-100 rounded-xl relative overflow-hidden group p-6">
                <div class="flex justify-end">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6 fill-gray-500  ">
                        <path
                            d="M20 22H18V20C18 18.3431 16.6569 17 15 17H9C7.34315 17 6 18.3431 6 20V22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22ZM12 13C8.68629 13 6 10.3137 6 7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7C18 10.3137 15.3137 13 12 13ZM12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-main text-3xl">
                        {{ App\Models\User::where('is_accepted', true)->whereHas('user_information', function ($record) {
                                $record->where('resident_type', 'Tenant');
                            })->count() }}
                    </p>
                    <p class="mt-1 text-gray-500">Total Tenant </p>
                </div>
                <div class="absolute -bottom-2 -right-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        class="h-20 opacity-20 group-hover:opacity-50 fill-main">
                        <path
                            d="M20 22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22ZM12 13C8.68629 13 6 10.3137 6 7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7C18 10.3137 15.3137 13 12 13Z">
                        </path>
                    </svg>
                </div>
            </a>
            <div class="border-2 cursor-pointer border-main bg-gray-100 rounded-xl relative overflow-hidden group p-6">
                <div class="flex justify-end">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6 fill-gray-500  ">
                        <path
                            d="M6.9998 6V3C6.9998 2.44772 7.44752 2 7.9998 2H19.9998C20.5521 2 20.9998 2.44772 20.9998 3V17C20.9998 17.5523 20.5521 18 19.9998 18H16.9998V20.9991C16.9998 21.5519 16.5499 22 15.993 22H4.00666C3.45059 22 3 21.5554 3 20.9991L3.0026 7.00087C3.0027 6.44811 3.45264 6 4.00942 6H6.9998ZM5.00242 8L5.00019 20H14.9998V8H5.00242ZM8.9998 6H16.9998V16H18.9998V4H8.9998V6ZM7 11H13V13H7V11ZM7 15H13V17H7V15Z">
                        </path>
                    </svg>
                </div>
                <div>
                    @php
                        $maintenance = \App\Models\MaintenanceRequest::count();
                        $amenity = \App\Models\AmenityRequest::count();
                        $gate = \App\Models\PassRequest::whereHas('pass', function ($record) {
                            $record->where('name', 'Gate Pass');
                        })->count();
                        $visitor = \App\Models\PassRequest::whereHas('pass', function ($record) {
                            $record->where('name', 'Visitor Pass');
                        })->count();

                        $parcel = \App\Models\PassRequest::whereHas('pass', function ($record) {
                            $record->where('name', 'Parcel Pass');
                        })->count();

                        $total_pending = $maintenance + $amenity + $visitor + $parcel + $gate;
                    @endphp
                    <p class="font-bold text-main text-3xl">{{ $total_pending }}</p>
                    <p class="mt-1 text-gray-500">Total Requests</p>
                </div>
                <div class="absolute -bottom-2 -right-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        class="h-20 opacity-20 group-hover:opacity-50 fill-main">
                        <path
                            d="M6.9998 6V3C6.9998 2.44772 7.44752 2 7.9998 2H19.9998C20.5521 2 20.9998 2.44772 20.9998 3V17C20.9998 17.5523 20.5521 18 19.9998 18H16.9998V20.9991C16.9998 21.5519 16.5499 22 15.993 22H4.00666C3.45059 22 3 21.5554 3 20.9991L3.0026 7.00087C3.0027 6.44811 3.45264 6 4.00942 6H6.9998ZM8.9998 6H16.9998V16H18.9998V4H8.9998V6ZM6.9998 11V13H12.9998V11H6.9998ZM6.9998 15V17H12.9998V15H6.9998Z">
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white mt-10 rounded-xl p-5 bg-opacity-80">
        <header class="text-xl font-semibold text-gray-700 uppercase">User Verification</header>
        <div class="mt-3">
            <livewire:admin.home />
        </div>
    </div>
    <livewire:charts />
</x-admin-layout>
