<div x-animate>
    <div class="flex flex-col space-y-3">
        <div>
            <h1 class="text-sm text-gray-500">Resident Type</h1>
            <h1 class="font-bold uppercase text-lg leading-4 text-[#1c4c4e]">
                {{ auth()->user()->user_information->resident_type }}</h1>

        </div>
        <div class="w-64">
            <h1 class="text-sm text-gray-500">Transaction Type</h1>
            <x-native-select wire:model="transaction" class="w-64">
                <option>Select an option</option>
                <option value="1">Maintenance</option>
                <option value="2">Amenities</option>
                <option value="3">Gate Pass</option>
                <option value="4">Visitor Pass</option>
                <option value="5">Parcel Pass</option>
            </x-native-select>

        </div>
    </div>

    @if ($transaction == 1)
        <div class="mt-5">
            <h1 class="text-center 2xl:text-left font-black text-xl text-green-800">ACCOUNT HISTORY</h1>
            <div class="border border-gray-500 rounded-lg flex flex-col space-y-2">
                @forelse ($transactions as $item)
                    <div class="grid grid-cols-2 gap-2 {{ $loop->last ? 'border-t border-gray-500' : '' }} p-1 px-2">
                        <div>MAINTENANCE -
                            {{ $item->maintenance->name }}(&#8369;{{ number_format($item->amount ?? 0, 2) }})</div>
                        <div class="text-right text-xs 2xl:text-sm">
                            <div class="text-2xs 2xl:text-sm">
                                DATE FILED:
                            </div>
                            <div>
                                {{ \Carbon\Carbon::parse($item->created_at)->format('F, d Y') }}
                            </div>
                        </div>
                        <div>
                            <div class="text-2xs 2xl:text-sm">
                                STATUS:
                            </div>
                            @if ($item->status == 'pending')
                                <x-badge label="PENDING" warning />
                            @elseif ($item->status == 'approved')
                                <x-badge label="APPROVED" blue />
                            @elseif ($item->status == 'completed')
                                <x-badge label="COMPLETED" positive />
                            @endif
                        </div>
                        <div class="text-right text-xs 2xl:text-sm">
                            <div class="text-2xs 2xl:text-sm">
                                DATE COMPLETED:
                            </div>
                            <div>
                                @if (!$item->date_completed)
                                @else
                                    {{ \Carbon\Carbon::parse($item->date_completed)->format('F, d Y') }}
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="p-5">
                        <span class="text-lg"> No History...</span>
                    </div>
                @endforelse
            </div>
        </div>
    @endif

    @if ($transaction == 2)
        <div class="mt-5">
            <h1 class="text-center 2xl:text-left font-black text-xl text-green-800">ACCOUNT HISTORY</h1>
            <div class="border border-gray-500 rounded-lg flex flex-col space-y-2">
                @forelse ($transactions as $item)
                    <div class="grid grid-cols-2 gap-2 {{ $loop->last ? 'border-t border-gray-500' : '' }} p-1 px-2">
                        <div>AMENITIES -
                            {{ $item->amenity->name }}(&#8369;{{ number_format($item->amount ?? 0, 2) }})</div>
                        <div class="text-right text-xs 2xl:text-sm">
                            <div class="text-2xs 2xl:text-sm">
                                DATE FILED:
                            </div>
                            <div>
                                {{ \Carbon\Carbon::parse($item->created_at)->format('F, d Y') }}
                            </div>
                        </div>
                        <div>
                            <div class="text-2xs 2xl:text-sm">
                                STATUS:
                            </div>
                            @if ($item->status == 'pending')
                                <x-badge label="PENDING" warning />
                            @elseif ($item->status == 'approved')
                                <x-badge label="APPROVED" blue />
                            @elseif ($item->status == 'completed')
                                <x-badge label="COMPLETED" positive />
                            @endif
                        </div>
                        <div class="text-right text-xs 2xl:text-sm">
                            <div class="text-2xs 2xl:text-sm">
                                DATE COMPLETED:
                            </div>
                            <div>
                                @if (!$item->date_completed)
                                @else
                                    {{ \Carbon\Carbon::parse($item->date_completed)->format('F, d Y') }}
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="p-5">
                        <span class="text-lg"> No History...</span>
                    </div>
                @endforelse
            </div>
        </div>
    @endif
    @if ($transaction == 3)
        <div class="mt-5">
            <h1 class="text-center 2xl:text-left font-black text-xl text-green-800">ACCOUNT HISTORY</h1>
            <div class="border border-gray-500 rounded-lg flex flex-col space-y-2">
                @forelse ($transactions as $item)
                    <div class="grid grid-cols-2 gap-2 {{ $loop->first ? '' : 'border-t border-gray-500' }} p-1 px-2">
                        <div class="uppercase font-medium">
                            {{ $item->pass->name }}-({{ $item->visitor_name }})</div>
                        <div class="text-right text-xs 2xl:text-sm">
                            <div class="text-2xs 2xl:text-sm">
                                DATE FILED:
                            </div>
                            <div>
                                {{ \Carbon\Carbon::parse($item->created_at)->format('F, d Y') }}
                            </div>
                        </div>
                        <div>
                            <div class="text-2xs 2xl:text-sm">
                                STATUS:
                            </div>
                            @if ($item->status == 'pending')
                                <x-badge label="PENDING" warning />
                            @elseif ($item->status == 'approved')
                                <x-badge label="APPROVED" blue />
                            @elseif ($item->status == 'completed')
                                <x-badge label="COMPLETED" positive />
                            @endif
                        </div>
                        <div class="text-right text-xs 2xl:text-sm">
                            <div class="text-2xs 2xl:text-sm">
                                DATE COMPLETED:
                            </div>
                            <div>
                                @if (!$item->date_completed)
                                @else
                                    {{ \Carbon\Carbon::parse($item->date_completed)->format('F, d Y') }}
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="p-5">
                        <span class="text-lg"> No History...</span>
                    </div>
                @endforelse
            </div>
            <div class="mt-2">
                {{ $transactions->links() }}
            </div>
        </div>
    @endif
    @if ($transaction == 4)
        <div class="mt-5">
            <h1 class="text-center 2xl:text-left font-black text-xl text-green-800">ACCOUNT HISTORY</h1>
            <div class="border border-gray-500 rounded-lg flex flex-col space-y-2">
                @forelse ($transactions as $item)
                    <div class="grid grid-cols-2 gap-2 {{ $loop->first ? '' : 'border-t border-gray-500' }} p-1 px-2">
                        <div class="uppercase font-medium">
                            {{ $item->pass->name }}-({{ $item->visitor_name }})</div>
                        <div class="text-right text-xs 2xl:text-sm">
                            <div class="text-2xs 2xl:text-sm">
                                DATE FILED:
                            </div>
                            <div>
                                {{ \Carbon\Carbon::parse($item->created_at)->format('F, d Y') }}
                            </div>
                        </div>
                        <div>
                            <div class="text-2xs 2xl:text-sm">
                                STATUS:
                            </div>
                            @if ($item->status == 'pending')
                                <x-badge label="PENDING" warning />
                            @elseif ($item->status == 'approved')
                                <x-badge label="APPROVED" blue />
                            @elseif ($item->status == 'completed')
                                <x-badge label="COMPLETED" positive />
                            @endif
                        </div>
                        <div class="text-right text-xs 2xl:text-sm">
                            <div class="text-2xs 2xl:text-sm">
                                DATE COMPLETED:
                            </div>
                            <div>
                                @if (!$item->date_completed)
                                @else
                                    {{ \Carbon\Carbon::parse($item->date_completed)->format('F, d Y') }}
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="p-5">
                        <span class="text-lg"> No History...</span>
                    </div>
                @endforelse
            </div>
            <div class="mt-2">
                {{ $transactions->links() }}
            </div>
        </div>
    @endif
    @if ($transaction == 5)
        <div class="mt-5">
            <h1 class="text-center 2xl:text-left font-black text-xl text-green-800">ACCOUNT HISTORY</h1>
            <div class="border border-gray-500 rounded-lg flex flex-col space-y-2">
                @forelse ($transactions as $item)
                    <div class="grid grid-cols-2 gap-2 {{ $loop->first ? '' : 'border-t border-gray-500' }} p-1 px-2">
                        <div>
                            <div class="uppercase font-medium">
                                {{ $item->pass->name }}</div>
                            <div class="uppercase text-sm text-blue-500 font-medium">
                                Number of expected parcels: {{ $item->quantity }}</div>
                        </div>
                        <div class="text-right text-xs 2xl:text-sm">
                            <div class="text-2xs 2xl:text-sm">
                                DATE FILED:
                            </div>
                            <div>
                                {{ \Carbon\Carbon::parse($item->created_at)->format('F, d Y') }}
                            </div>
                        </div>
                        <div>
                            <div class="text-2xs 2xl:text-sm">
                                STATUS:
                            </div>
                            @if ($item->status == 'pending')
                                <x-badge label="PENDING" warning />
                            @elseif ($item->status == 'approved')
                                <x-badge label="APPROVED" blue />
                            @elseif ($item->status == 'completed')
                                <x-badge label="COMPLETED" positive />
                            @endif
                        </div>
                        <div class="text-right text-xs 2xl:text-sm">
                            <div class="text-2xs 2xl:text-sm">
                                DATE COMPLETED:
                            </div>
                            <div>
                                @if (!$item->date_completed)
                                @else
                                    {{ \Carbon\Carbon::parse($item->date_completed)->format('F, d Y') }}
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="p-5">
                        <span class="text-lg"> No History...</span>
                    </div>
                @endforelse
            </div>
            <div class="mt-2">
                {{ $transactions->links() }}
            </div>
        </div>
    @endif
</div>
