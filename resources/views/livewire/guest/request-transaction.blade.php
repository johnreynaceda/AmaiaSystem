<div x-animate>
    <div>
        {{ $this->form }}
    </div>
    @if ($request == 'Maintenance')
        <div class="mt-5 border-t-4 border-[#1c4c4e]">
            <div class="py-3 flex flex-col space-y-2">
                <div>
                    <h1 class="text-sm text-gray-500">Request Type</h1>
                    <h1 class="font-bold uppercase text-lg leading-4 text-[#1c4c4e]">MAINTENANCE</h1>
                    <p class="text-xs text-red-500">Note that our maintenance team will first conduct checking before
                        determining the
                        proper action.</p>
                </div>
                <div>
                    <h1 class="text-sm text-gray-500">Unit Number</h1>
                    <h1 class="font-bold uppercase text-lg leading-4 text-[#1c4c4e]">
                        ROOM {{ auth()->user()->user_information->unit_number }}</h1>
                </div>
                <div class="2xl:w-72">
                    <h1 class="text-sm text-gray-500">Maintainance Type</h1>
                    <x-native-select wire:model="maintenance_id" class="w-64">
                        <option>Select an option</option>
                        @foreach ($maintenances as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </x-native-select>
                    @if ($maintenance_id)
                        <p class="text-sm whitespace-pre-line mt-1">
                            ({{ \App\Models\Maintenance::where('id', $maintenance_id)->first()->description }})</p>
                    @endif
                    <p class="text-xs text-red-500">Please be notified with our message for transaction updated and your
                        bill.</p>
                </div>
            </div>
            <div class="mt-5">
                <div class="pb-2">
                    <h1 class="font-medium uppercase">available schedule time: </h1>
                    <h1>7:30 am – 10:00 pm </h1>
                </div>
                <h1 class="font-bold text-xl text-center 2xl:text-left text-[#1c4c4e]">Let's fill the details</h1>
                <div
                    class="mt-3 bg-[#1c4c4e] bg-opacity-80 rounded-lg grid 2xl:grid-cols-4 grid-cols-1 gap-2 py-6 px-2">
                    <div>
                        <x-datetime-picker id="min-max-times-input" without-timezone min-time="07:30" :min="now()"
                            max-time="22:00" placeholder="Request Date" wire:model="request_date" />
                    </div>
                    <div>
                        {{-- <x-time-picker placeholder="Request Time" wire:model="request_time" /> --}}
                    </div>
                    <div>

                    </div>
                    <div>
                        <x-button label="View Form" wire:click="$set('view_form', true)" white icon="document-text" />
                    </div>
                </div>
                <p class="mt-2 text-gray-700 text-sm">
                    By Clicking submit, you have read and agreed to the maintenance and repair from of AMAIA SKIES.
                </p>
            </div>
            <div class="mt-3 ">
                <x-button label="Submit" wire:click="submitMaintenance" spinner="submitMaintenance" dark positive
                    class="font-medium" />
            </div>
        </div>
        <x-modal blur wire:model.defer="view_form" align="center">
            <div>
                <img src="{{ asset('images/files/Maintenance _ Repair Form.jpg') }}" class="2xl:h-[40rem] h-[30rem] "
                    alt="">
            </div>
        </x-modal>
    @endif
    @if ($request == 'Amenities')
        <div class="mt-5 border-t-4 border-[#1c4c4e]">
            <div class="py-3 flex flex-col space-y-2">
                <div>
                    <h1 class="text-sm text-gray-500">Request Type</h1>
                    <h1 class="font-bold uppercase text-lg leading-4 text-[#1c4c4e]">AMENITIES</h1>

                </div>
                <div class="2xl:w-72">
                    <h1 class="text-sm text-gray-500">Amenity Type</h1>
                    <x-native-select wire:model="amenity_type" class="w-64">
                        <option>Select an option</option>
                        @foreach ($amenities as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </x-native-select>
                    @if ($amenity_type)
                        <div class="text-sm mt-1">
                            <h1>Description:</h1>
                            <p class="whitespace-pre-line">
                                {{ \App\Models\Amenity::where('id', $amenity_type)->first()->description }}</p>
                        </div>
                    @endif
                </div>
                <div class="2xl:w-72">
                    <h1 class="text-sm text-gray-500">Occasion</h1>
                    <x-input wire:model="ocassion" />
                </div>
                <div class="2xl:w-72">
                    <h1 class="text-sm text-gray-500">No. of persons</h1>
                    <x-inputs.number wire:model="total_persons" />
                </div>
                @if ($amenity_type == \App\Models\Amenity::where('name', 'like', '%' . 'Function Room' . '%')->first()->id)
                    @if ($total_persons > 10)
                        <div class="2xl:w-72">
                            <h1 class="text-sm text-gray-500">Attachment</h1>
                            <div class="flex space-x-2 items-center">
                                <input type="file" wire:model="attachment">
                                <span wire:loading wire:target="attachment"
                                    class="text-sm text-red-400">Loading...</span>
                            </div>
                        </div>
                    @else
                        <div class="2xl:w-72">
                            <h1 class="text-sm text-gray-500">Visitor</h1>
                            <x-textarea wire:model="visitor" placeholder="Registered Visitor" />
                            <p class="text-xs">Put a comma(,) to separate the names.</p>
                        </div>
                    @endif
                @else
                    <div class="2xl:w-72">
                        <h1 class="text-sm text-gray-500">Visitor</h1>
                        <x-textarea wire:model="visitor" placeholder="Registered Visitor" />
                        <p class="text-xs">Put a comma(,) to separate the names.</p>
                    </div>
                @endif


                <div>
                    <h1 class="text-sm text-gray-500">Amount</h1>
                    <h1 class="font-bold uppercase text-lg leading-4 text-red-600">
                        &#8369;{{ number_format($amount, 2) }}</h1>
                </div>
            </div>
            <div class="mt-5">
                <div class="pb-2">
                    <h1 class="font-medium uppercase">available schedule time: </h1>
                    <h1>7:30 am – 10:00 pm </h1>
                </div>
                <h1 class="font-bold text-xl text-center 2xl:text-left text-[#1c4c4e]">Let's fill the details</h1>
                <div
                    class="mt-3 bg-[#1c4c4e] bg-opacity-80 rounded-lg grid 2xl:grid-cols-4 grid-cols-1 gap-2 py-6 px-2">
                    <div>
                        <x-datetime-picker id="min-max-times-input" without-timezone min-time="07:30" :min="now()"
                            max-time="22:00" placeholder="Request Date" wire:model="request_date" />
                    </div>
                    <div>
                        {{-- <x-time-picker placeholder="Request Time" wire:model="request_time" /> --}}
                        {{-- <input type="time" id="timePicker" name="timePicker" min="07:30" max="22:00"> --}}
                    </div>
                    <div>
                        <x-textarea class="2xl:hidden" wire:model="remarks" placeholder="write your remarks" />
                    </div>
                    <div>
                        <x-button label="View Form" wire:click="$set('amenity_form', true)" white
                            icon="document-text" />
                    </div>
                    <div class="hidden 2xl:block">
                        <x-textarea wire:model="remarks" placeholder="write your remarks" />
                    </div>
                </div>
                <p class="mt-2 text-gray-700 text-sm">
                    By Clicking submit, you have read and accept the Amenities and Scheduled Reservation form of AMAIA
                    SKIES.
                </p>
            </div>
            <div class="mt-3 ">
                <x-button label="Submit" wire:click="submitAmenities" spinner="submitAmenities" dark positive
                    class="font-medium " />

                {{-- <x-button label="Submit Request" wire:click="submitAmenity" spinner="submitAmenity" dark positive
                    class="font-medium  2xl:hidden" /> --}}
            </div>
        </div>

    @endif
    @if ($request == 'Gate Pass')
        <div class="mt-5 border-t-4 border-[#1c4c4e]">
            <div class="py-3 flex flex-col space-y-2">
                <div>
                    <h1 class="text-sm text-gray-500">Request Type</h1>
                    <h1 class="font-bold uppercase text-lg leading-4 text-[#1c4c4e]">GATE PASS</h1>

                </div>
                <div class="2xl:w-72">
                    <h1 class="text-sm text-gray-500">Name of Visitor</h1>
                    <x-input wire:model="visitor" />
                </div>
                <div class="2xl:w-72">
                    <h1 class="text-sm text-gray-500">Email</h1>
                    <x-input wire:model="email" />
                </div>
                <div class="2xl:w-72">
                    <h1 class="text-sm text-gray-500">Location</h1>
                    <div class="grid 2xl:grid-cols-2 grid-cols-1 gap-4">
                        {{-- <div><x-input placeholder="Bldg. No" wire:model="building" /></div> --}}
                        <x-native-select wire:model="building">
                            <option>Select An Option</option>
                            <option value="bldg 1">bldg 1</option>

                            <option value="bldg 2">bldg 2</option>

                        </x-native-select>
                        <div><x-input placeholder="Area/Unit" wire:model="unit" /></div>
                    </div>
                </div>

                <div class="2xl:w-72">
                    <h1 class="text-sm text-gray-500">Purpose</h1>
                    <x-input wire:model="purpose" />
                </div>
                <div class="2xl:w-72">
                    <h1 class="text-sm text-gray-500"></h1>
                    <div class="grid 2xl:grid-cols-2 grid-cols-1 gap-4">
                        <div><x-input placeholder="Particulars" wire:model="particulars" /></div>
                        <div><x-input placeholder="Qty" wire:model="quantity" /></div>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <h1 class="font-bold text-xl text-center 2xl:text-left text-[#1c4c4e]">Let's fill the details</h1>
                <div
                    class="mt-3 bg-[#1c4c4e] bg-opacity-80 rounded-lg grid 2xl:grid-cols-4 grid-cols-1 gap-2 py-6 px-2">
                    <div>
                        <x-datetime-picker id="min-max-times-input" without-timezone min-time="07:30"
                            :min="now()" max-time="22:00" placeholder="Request Date"
                            wire:model="request_date" />
                        <span class="text-xs text-white"> Gate Pass are valid for a day only.</span>
                    </div>
                    <div>
                        {{-- <x-time-picker placeholder="Request Time" wire:model="request_time" /> --}}
                    </div>

                    <div>
                        <x-button label="View Form" wire:click="$set('gate_form', true)" white
                            icon="document-text" />
                    </div>

                </div>
                <p class="mt-2 text-gray-700 text-sm">
                    By Clicking submit, you have read and accept the Gate Pass Agreement form of AMAIA
                    SKIES.
                </p>
            </div>
            <div class="mt-3 ">
                <x-button label="Submit" wire:click="submitGatePass" spinner="submitGatePass" dark positive
                    class="font-medium" />
            </div>
        </div>
        <x-modal blur wire:model.defer="gate_form" align="center">
            <div>
                <img src="{{ asset('images/files/Gate Pass Agreement Form_.jpg') }}" class="2xl:h-[40rem] h-[30rem] "
                    alt="">
            </div>
        </x-modal>
    @endif
    @if ($request == 'Visitor Pass')
        <div class="mt-5 border-t-4 border-[#1c4c4e]">
            <div class="py-3 flex flex-col space-y-2">
                <div>
                    <h1 class="text-sm text-gray-500">Request Type</h1>
                    <h1 class="font-bold uppercase text-lg leading-4 text-[#1c4c4e]">VISITOR PASS</h1>

                </div>
                <div class="2xl:w-72">
                    <h1 class="text-sm text-gray-500">Name of Visitor</h1>
                    <x-input wire:model="visitor" />
                </div>
                <div class="2xl:w-72">
                    <h1 class="text-sm text-gray-500">Email</h1>
                    <x-input wire:model="email" />
                </div>
                <div class="2xl:w-72">
                    <h1 class="text-sm text-gray-500">Unit</h1>
                    <x-input wire:model="unit" />
                </div>

                <div class="2xl:w-72">
                    <h1 class="text-sm text-gray-500">Relation to Tenant/Unit Owner</h1>
                    <x-input wire:model="relation" />
                </div>
            </div>
            <div class="mt-5">

                <h1 class="font-bold text-xl text-center 2xl:text-left text-[#1c4c4e]">Let's fill the details</h1>
                <div
                    class="mt-3 bg-[#1c4c4e] bg-opacity-80 rounded-lg grid 2xl:grid-cols-4 grid-cols-1 gap-2 py-6 px-2">
                    <div>
                        <x-datetime-picker id="min-max-times-input" without-timezone min-time="07:30"
                            :min="now()" max-time="22:00" placeholder="Request Date"
                            wire:model="request_date" />

                    </div>
                    <div>
                        {{-- <x-time-picker placeholder="Request Time" wire:model="request_time" /> --}}
                    </div>

                    <div>
                        <x-button label="View Consent" wire:click="$set('visitor_form', true)" white
                            icon="document-text" />
                        <x-button label="View Clause" wire:click="$set('visitor_clause', true)" white
                            icon="document-text" />
                    </div>

                </div>
                <p class="mt-2 text-gray-700 text-sm">
                    By Clicking submit, you have read and accept the Tenant Liability Clause and Visitor Consent form of
                    AMAIA
                    SKIES.
                </p>
            </div>
            <div class="mt-3 ">
                <x-button label="Submit" wire:click="submitVisitorPass" spinner="submitVisitorPass" dark positive
                    class="font-medium" />
            </div>
        </div>
        <x-modal blur wire:model.defer="visitor_form" align="center">
            <div>
                <img src="{{ asset('images/files/visitor form.png') }}" class="2xl:h-[40rem] h-[30rem] "
                    alt="">
            </div>
        </x-modal>
        <x-modal blur wire:model.defer="visitor_clause" align="center">
            <div>
                <img src="{{ asset('images/files/Tenant Liability Clause.jpg') }}" class="2xl:h-[40rem] h-[30rem] "
                    alt="">
            </div>
        </x-modal>
    @endif
    @if ($request == 'Parcel Pass')
        <div class="mt-5 border-t-4 border-[#1c4c4e]">
            <div class="py-3 flex flex-col space-y-2">
                <div>
                    <h1 class="text-sm text-gray-500">Request Type</h1>
                    <h1 class="font-bold uppercase text-lg leading-4 text-[#1c4c4e]">PARCEL PASS</h1>

                </div>
                <div class="2xl:w-72">
                    <h1 class="text-sm text-gray-500">Contact Number</h1>
                    <x-input wire:model="contact" maxlength="11" pattern="[0-9]*" />
                </div>
                <div class="2xl:w-72">
                    <h1 class="text-sm text-gray-500">Email</h1>
                    <x-input wire:model="email" />
                </div>

                <div class="2xl:w-72">
                    <h1 class="text-sm text-gray-500">Number of Expected parcel/s</h1>
                    <x-input wire:model="quantity" />
                </div>

                <div class="2xl:w-72">
                    <h1 class="text-sm text-gray-500">Reason of Unavailabity</h1>
                    <x-input wire:model="reason" />
                </div>

                <div class="2xl:w-72">
                    <h1 class="text-sm text-gray-500">Expected Date of Arrival</h1>
                    <x-datetime-picker id="min-max-times-input" without-timezone min-time="07:30" :min="now()"
                        max-time="22:00" placeholder="Request Date" wire:model="request_date" />
                    <p class="text-xs mt-1">
                        Note that the actual start of the validity is the
                        Date and Time this form has been submitted.</p>
                </div>
            </div>
            <div class="mt-5">
                <div class="mt-3 bg-[#1c4c4e] bg-opacity-80 rounded-lg place-content-center grid  py-6 px-2">
                    <p class="text-white text-center 2xl:text-lg">I hereby authorize Amaia Skies
                        Sta. Mesa Condominium
                        Corporation staff to receive
                        my parcel on my behalf. The
                        management/staff shall not
                        be made liable for any loss or
                        damage that the parcel may
                        have.</p>

                </div>
                {{-- <p class="mt-2 text-gray-700 text-sm">
                    By Clicking submit, you have read and accept the Tenant Liability Clause and Visitor Consent form of
                    AMAIA
                    SKIES.
                </p> --}}
            </div>
            <div class="mt-3 ">
                <x-button label="Submit" wire:click="submitParcelPass" spinner="submitParcelPass" dark positive
                    class="font-medium" />
            </div>
        </div>
        <x-modal blur wire:model.defer="visitor_form" align="center">
            <div>
                <img src="{{ asset('images/files/') }}" class="2xl:h-[40rem] h-[30rem] " alt="">
            </div>
        </x-modal>
        <x-modal blur wire:model.defer="visitor_clause" align="center">
            <div>
                <img src="{{ asset('images/files/Tenant Liability Clause.jpg') }}" class="2xl:h-[40rem] h-[30rem] "
                    alt="">
            </div>
        </x-modal>
    @endif

    <x-modal blur wire:model.defer="amenity_form" align="center">
        <div>
            <img src="{{ asset('images/files/Amenities and Scheduled Reservation_.jpg') }}"
                class="2xl:h-[40rem] h-[30rem] " alt="">
        </div>
    </x-modal>

</div>
