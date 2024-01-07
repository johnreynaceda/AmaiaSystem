<div x-animate>
    <div class="bg-white p-5 rounded-xl bg-opacity-80">
        <div>{{ $this->form }}</div>
        {{-- {{ $request }}
        @if ($requestor_data != null)
            <div class="mt-5 bg-[#1c4c4e] bg-opacity-20 rounded-xl p-5 px-10">
                <div class="grid grid-cols-4 gap-1">
                    <div class="col-span-2 flex space-x-3 items-center">
                        <span class="font-bold uppercase text-lg text-gray-600">RESIDENT TYPE:</span>
                        <span class="font-medium text-lg text-[#1c4c4e]">{{ $requestor_data->resident_type }}</span>
                    </div>
                    <div class="col-span-2 flex space-x-3 items-center">
                        <span class="font-bold uppercase text-lg text-gray-600">FIRSTNAME:</span>
                        <span class="font-medium text-lg text-[#1c4c4e]">{{ $requestor_data->firstname }}</span>
                    </div>
                    <div class="col-span-2 flex space-x-3 items-center">
                        <span class="font-bold uppercase text-lg text-gray-600">EMAIL ADDRESS:</span>
                        <span class="font-medium text-lg text-[#1c4c4e]">{{ $requestor_data->user->email }}</span>
                    </div>
                    <div class="col-span-2 flex space-x-3 items-center">
                        <span class="font-bold uppercase text-lg text-gray-600">LASTNAME:</span>
                        <span class="font-medium text-lg text-[#1c4c4e]">{{ $requestor_data->lastname }}</span>
                    </div>
                    <div class="col-span-2 flex space-x-3 items-center">
                        <span class="font-bold uppercase text-lg text-gray-600">PREFFERED MAILING ADDRESS:</span>
                        <span
                            class="font-medium text-lg text-[#1c4c4e]">{{ $requestor_data->preffered_mailing_address }}</span>
                    </div>
                    <div class="col-span-2 flex space-x-3 items-center">
                        <span class="font-bold uppercase text-lg text-gray-600">MIDDLENAME:</span>
                        <span class="font-medium text-lg text-[#1c4c4e]">{{ $requestor_data->middlename }}</span>
                    </div>
                </div>
            </div>
            <div class="flex items-end space-x-2">
                <div class="mt-5 w-72">
                    <x-native-select label="Type of Requests" wire:model="request">
                        <option>Select an option</option>
                        <option value="1">Maintenance</option>
                        <option value="2">Amenities</option>
                        <option value="3">Gate Pass</option>
                        <option value="4">Visitor Pass</option>
                        <option value="5">Parcel Pass</option>
                    </x-native-select>

                </div>
                <x-button.circle teal spinner icon="refresh" />
            </div>
        @endif --}}

        <div x-animate>
            @if ($request == 1)
                <div class="mt-5">
                    <livewire:admin.maintenance-request-list :unitNumber="$unit_number" />
                </div>
            @endif
            @if ($request == 2)
                <div class="mt-5">
                    <livewire:admin.amenity-request-list :unitNumber="$unit_number" />
                </div>
            @endif
            @if ($request == 3)
                <div class="mt-5">
                    <livewire:admin.gate-pass-request-list :unitNumber="$unit_number" />
                </div>
            @endif
            @if ($request == 4)
                <div class="mt-5">
                    <livewire:admin.visitor-request-list :unitNumber="$unit_number" />
                </div>
            @endif
            @if ($request == 5)
                <div class="mt-5">
                    <livewire:admin.parcel-request-list :unitNumber="$unit_number" />
                </div>
            @endif
        </div>
    </div>
</div>
