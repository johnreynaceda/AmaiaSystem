<div x-data>
    <div class="bg-white rounded-xl p-5">
        <div class="flex justify-between">
            <div class="w-72">
                <x-native-select label="" wire:model="type">
                    <option>Select An Option</option>
                    <option value="1">Maintenance</option>
                    <option value="2">Amenities</option>
                    <option value="3">Gate Pass</option>
                    <option value="4">Visitor Pass</option>
                    <option value="5">Parcel Pass</option>
                </x-native-select>
            </div>
            <div class="flex space-x-2 items-center">
                <x-button label="DOWNLOAD" class="font-bold" wire:click="download" icon="download" dark />
                <x-button label="Print" class="font-bold uppercase" @click="printOut($refs.printContainer.outerHTML);"
                    icon="printer" positive />
                {{-- <x-button label="Export" class="font-bold uppercase" right-icon="document-text" dark /> --}}
            </div>
        </div>
        <div class="mt-10 px-10" x-ref="printContainer">
            <div class="flex items-center space-x-1">
                <img src="{{ asset('images/favicon.png') }}" class="h-20" alt="">
                <div>
                    <h1 class="font-bold text-2xl uppercase text-gray-700">AMAIA SKIES - Information Management System
                    </h1>
                    <h1 class="leading-3">Monthly Report ({{ now()->format('F') }})</h1>
                </div>
            </div>
            <div class="mt-5" x-animate>
                @if (!$type)
                    <h1 class="text-gray-600 animate-pulse">Please select a report to generate...</h1>
                @else
                    @if ($type == 1)
                        <div class="my-3">
                            <h1 class="text-xl font-bold text-gray-700">MAINTENANCE REQUESTS</h1>
                        </div>
                        <table id="example" class="table-auto mt-5" style="width:100%">
                            <thead class="font-normal">
                                <tr>
                                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                        TYPE </th>
                                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                        UNIT
                                    </th>
                                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                        RESIDENT NAME
                                    </th>
                                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                        REQUESTED DATE
                                    </th>
                                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                        PREFFERED TIME
                                    </th>
                                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                        AMOUNT
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="">
                                @forelse ($reports as $report)
                                    <tr>
                                        <td class="border-2  text-gray-700  px-3 py-1">
                                            {{ $report->maintenance->name }}
                                        </td>
                                        <td class="border-2  text-gray-700  px-3 py-1">
                                            {{ $report->user->user_information->unit_number }}
                                        </td>
                                        <td class="border-2  text-gray-700  px-3 py-1">
                                            {{ $report->user->name }}
                                        </td>
                                        <td class="border-2  text-gray-700  px-3 py-1">
                                            {{ \Carbon\Carbon::parse($report->request_date)->format('F d, Y') }}
                                        </td>
                                        <td class="border-2  text-gray-700  px-3 py-1">
                                            {{ \Carbon\Carbon::parse($report->request_date)->format('H:i A') }}
                                        </td>
                                        <td class="border-2  text-gray-700  px-3 py-1">
                                            {{ number_format($report->amount, 2) }}
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    @endif
                    @if ($type == 2)
                        <div class="my-3">
                            <h1 class="text-xl font-bold text-gray-700">AMENITY REQUESTS</h1>
                        </div>
                        <table id="example" class="table-auto mt-5" style="width:100%">
                            <thead class="font-normal">
                                <tr>
                                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                        TYPE </th>
                                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                        UNIT
                                    </th>
                                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                        RESIDENT NAME
                                    </th>
                                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                        REQUESTED DATE
                                    </th>
                                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                        PREFFERED TIME
                                    </th>
                                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                        AMOUNT
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="">
                                @forelse ($reports as $report)
                                    <tr>
                                        <td class="border-2  text-gray-700  px-3 py-1">
                                            {{ $report->amenity->name }}
                                        </td>
                                        <td class="border-2  text-gray-700  px-3 py-1">
                                            {{ $report->user->user_information->unit_number }}
                                        </td>
                                        <td class="border-2  text-gray-700  px-3 py-1">
                                            {{ $report->user->name }}
                                        </td>
                                        <td class="border-2  text-gray-700  px-3 py-1">
                                            {{ \Carbon\Carbon::parse($report->request_date)->format('F d, Y') }}
                                        </td>
                                        <td class="border-2  text-gray-700  px-3 py-1">
                                            {{ \Carbon\Carbon::parse($report->request_date)->format('H:i A') }}
                                        </td>
                                        <td class="border-2  text-gray-700  px-3 py-1">
                                            {{ $report->amount }}
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    @endif
                    @if ($type == 3)
                        <div class="my-3">
                            <h1 class="text-xl font-bold text-gray-700">GATE PASS REQUESTS</h1>
                        </div>
                        <table id="example" class="table-auto mt-5" style="width:100%">
                            <thead class="font-normal">
                                <tr>
                                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                        TYPE </th>
                                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                        UNIT
                                    </th>
                                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                        VISITOR NAME
                                    </th>
                                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                        PURPOSE
                                    </th>
                                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                        REQUESTED DATE
                                    </th>
                                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                        PREFFERED TIME
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="">
                                @forelse ($reports as $report)
                                    <tr>
                                        <td class="border-2  text-gray-700  px-3 py-1">
                                            {{ $report->pass->name }}
                                        </td>
                                        <td class="border-2  text-gray-700  px-3 py-1">
                                            {{ $report->user->user_information->unit_number }}
                                        </td>
                                        <td class="border-2  text-gray-700  px-3 py-1">
                                            {{ $report->user->name }}
                                        </td>
                                        <td class="border-2  text-gray-700  px-3 py-1">
                                            {{ $report->purpose }}
                                        </td>
                                        <td class="border-2  text-gray-700  px-3 py-1">
                                            {{ \Carbon\Carbon::parse($report->request_date)->format('F d, Y') }}
                                        </td>
                                        <td class="border-2  text-gray-700  px-3 py-1">
                                            {{ \Carbon\Carbon::parse($report->request_date)->format('H:i A') }}
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    @endif
                    @if ($type == 4)
                        <div class="my-3">
                            <h1 class="text-xl font-bold text-gray-700">VISITOR PASS REQUESTS</h1>
                        </div>
                        <table id="example" class="table-auto mt-5" style="width:100%">
                            <thead class="font-normal">
                                <tr>
                                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                        TYPE </th>
                                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                        UNIT
                                    </th>
                                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                        VISITOR NAME
                                    </th>
                                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                        RELATION
                                    </th>
                                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                        REQUESTED DATE
                                    </th>
                                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                        PREFFERED TIME
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="">
                                @forelse ($reports as $report)
                                    <tr>
                                        <td class="border-2  text-gray-700  px-3 py-1">
                                            {{ $report->pass->name }}
                                        </td>
                                        <td class="border-2  text-gray-700  px-3 py-1">
                                            {{ $report->user->user_information->unit_number }}
                                        </td>
                                        <td class="border-2  text-gray-700  px-3 py-1">
                                            {{ $report->user->name }}
                                        </td>
                                        <td class="border-2  text-gray-700  px-3 py-1">
                                            {{ $report->relation }}
                                        </td>
                                        <td class="border-2  text-gray-700  px-3 py-1">
                                            {{ \Carbon\Carbon::parse($report->request_date)->format('F d, Y') }}
                                        </td>
                                        <td class="border-2  text-gray-700  px-3 py-1">
                                            {{ \Carbon\Carbon::parse($report->request_date)->format('H:i A') }}
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    @endif
                    @if ($type == 5)
                        <div class="my-3">
                            <h1 class="text-xl font-bold text-gray-700">PARCEL PASS REQUESTS</h1>
                        </div>
                        <table id="example" class="table-auto mt-5" style="width:100%">
                            <thead class="font-normal">
                                <tr>
                                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                        TYPE </th>
                                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                        CONTACT NUMBER </th>
                                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                        UNIT
                                    </th>
                                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                        VISITOR NAME
                                    </th>
                                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                        RELATION
                                    </th>
                                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                        # OF EXPECTED PARCEL </th>
                                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                        DATE SUBMITTED
                                    </th>
                                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                        EXPECTED DATE OF ARRIVAL
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="">
                                @forelse ($reports as $report)
                                    <tr>
                                        <td class="border-2  text-gray-700  px-3 py-1">
                                            {{ $report->pass->name }}
                                        </td>
                                        <td class="border-2  text-gray-700  px-3 py-1">
                                            {{ $report->contact_number }}
                                        </td>
                                        <td class="border-2  text-gray-700  px-3 py-1">
                                            {{ $report->user->user_information->unit_number }}
                                        </td>
                                        <td class="border-2  text-gray-700  px-3 py-1">
                                            {{ $report->user->name }}
                                        </td>
                                        <td class="border-2  text-gray-700  px-3 py-1">
                                            {{ $report->purpose }}
                                        </td>
                                        <td class="border-2  text-gray-700  px-3 py-1">
                                            {{ $report->quantity }}
                                        </td>
                                        <td class="border-2  text-gray-700  px-3 py-1">
                                            {{ \Carbon\Carbon::parse($report->created_at)->format('F d, Y') }}
                                        </td>
                                        <td class="border-2  text-gray-700  px-3 py-1">
                                            {{ \Carbon\Carbon::parse($report->request_date)->format('H:i A') }}
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>
