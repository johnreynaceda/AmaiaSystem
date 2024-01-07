<div>
    <x-button md label="Gate Pass" wire:click="$set('gate_modal', true)" icon="document-text" class="font-semibold"
        positive />
    <x-button md label="Visitor Pass" wire:click="$set('visitor_modal', true)" icon="document-text" class="font-semibold"
        positive />

    <x-modal wire:model.defer="gate_modal">

        <x-card title="Gate Pass">

            <div>
                <div class="">
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
                            <h1 class="text-sm text-gray-500">Location</h1>
                            <div class="grid 2xl:grid-cols-2 grid-cols-1 gap-4">
                                <div><x-input placeholder="Bldg. No" wire:model="building" /></div>
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
                        <h1 class="font-bold text-xl text-center 2xl:text-left text-[#1c4c4e]">Let's fill the details
                        </h1>
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

                </div>

            </div>



            <x-slot name="footer">

                <div class="flex justify-end gap-x-4">

                    <x-button flat label="Cancel" x-on:click="close" />

                    <x-button dark label="Submit" wire:click="submitGatePass" spinner="submitGatePass" />

                </div>

            </x-slot>

        </x-card>

    </x-modal>

    <x-modal wire:model.defer="visitor_modal">

        <x-card title="Visitor Pass">
            <div>
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
                        By Clicking submit, you have read and accept the Tenant Liability Clause and Visitor Consent
                        form of
                        AMAIA
                        SKIES.
                    </p>
                </div>

            </div>
            <x-slot name="footer">

                <div class="flex justify-end gap-x-4">

                    <div>
                        <x-button flat label="Cancel" x-on:click="close" />

                        <x-button dark label="Submit" wire:click="submitVisitorPass" class="mt-1"
                            spinner="submitVisitorPass" />
                    </div>

                </div>

            </x-slot>

        </x-card>

    </x-modal>
    <x-modal blur wire:model.defer="gate_form" align="center">
        <div>
            <img src="{{ asset('images/files/Gate Pass Agreement Form_.jpg') }}" class="2xl:h-[40rem] h-[30rem] "
                alt="">
        </div>
    </x-modal>
    <x-modal blur wire:model.defer="visitor_form" align="center">
        <div>
            <img src="{{ asset('images/files/visitor form.png') }}" class="2xl:h-[40rem] h-[30rem] " alt="">
        </div>
    </x-modal>
    <x-modal blur wire:model.defer="visitor_clause" align="center">
        <div>
            <img src="{{ asset('images/files/Tenant Liability Clause.jpg') }}" class="2xl:h-[40rem] h-[30rem] "
                alt="">
        </div>
    </x-modal>
</div>
