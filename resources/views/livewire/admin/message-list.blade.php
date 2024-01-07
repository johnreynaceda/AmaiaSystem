<div>
    <div class="flex  overflow-hidden bg-white rounded-xl">
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64">
                <div class="flex flex-col flex-grow pt-5 overflow-y-auto bg-white border-r border-[#1c4c4e] pb-10">
                    <div class="flex flex-col flex-shrink-0 px-4">

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
                    <div class="flex flex-col flex-grow px-4 mt-5">
                        <nav class="flex-1 space-y-1 bg-white">
                            <ul>
                                <li>
                                    {{-- <button wire:click="$set('compose', true)"
                                        class="inline-flex items-center  px-4 py-4 mt-1 text-white fill-white transition duration-200 ease-in-out font-semibold transform bg-[#1c4c4e]  rounded-lg focus:shadow-outline hover:scale-95 hover:text-white"
                                        href="#">

                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 md hydrated"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M5 18.89H6.41421L15.7279 9.57629L14.3137 8.16207L5 17.4758V18.89ZM21 20.89H3V16.6474L16.435 3.21233C16.8256 2.8218 17.4587 2.8218 17.8492 3.21233L20.6777 6.04075C21.0682 6.43128 21.0682 7.06444 20.6777 7.45497L9.24264 18.89H21V20.89ZM15.7279 6.74786L17.1421 8.16207L18.5563 6.74786L17.1421 5.33365L15.7279 6.74786Z">
                                            </path>
                                        </svg>
                                        <span class="ml-2">
                                            Compose
                                        </span>
                                    </button> --}}
                                    <x-button label="Compose" wire:click="compose" icon="pencil-alt" positive spinner
                                        class="font-bold" />
                                </li>

                            </ul>
                            <p class="px-4 pt-10 text-xs font-semibold text-gray-400 uppercase">

                            </p>
                            <ul>

                                <li wire:click="sidebarLink('Sent')">
                                    <a class="{{ $sidebar == 'Sent' ? 'bg-[#1c4c4e]/90 scale-95 text-white fill-white' : '' }} inline-flex items-center w-full px-4 py-2 mt-1  text-[#1c4c4e] fill-[#1c4c4e] transition duration-200 ease-in-out font-semibold transform rounded-xl focus:shadow-outline hover:bg-[#1c4c4e]/90 hover:scale-95 hover:text-white hover:fill-white"
                                        href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M3.5 1.3457C3.58425 1.3457 3.66714 1.36699 3.74096 1.4076L22.2034 11.562C22.4454 11.695 22.5337 11.9991 22.4006 12.241C22.3549 12.3241 22.2865 12.3925 22.2034 12.4382L3.74096 22.5925C3.499 22.7256 3.19497 22.6374 3.06189 22.3954C3.02129 22.3216 3 22.2387 3 22.1544V1.8457C3 1.56956 3.22386 1.3457 3.5 1.3457ZM5 4.38261V11.0001H10V13.0001H5V19.6175L18.8499 12.0001L5 4.38261Z">
                                            </path>
                                        </svg>
                                        <span class="ml-2">
                                            SENT
                                        </span>
                                    </a>
                                </li>
                                <li wire:click="sidebarLink('All Inbox')">
                                    <a class="{{ $sidebar == 'All Inbox' ? 'bg-[#1c4c4e]/90 scale-95 text-white fill-white' : '' }} inline-flex items-center w-full px-4 py-2 mt-1  text-[#1c4c4e] fill-[#1c4c4e] transition duration-200 ease-in-out font-semibold transform rounded-xl focus:shadow-outline hover:bg-[#1c4c4e]/90 hover:scale-95 hover:text-white hover:fill-white"
                                        href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M21 3C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H21ZM11 13H4V19H11V13ZM20 13H13V19H20V13ZM11 5H4V11H11V5ZM20 5H13V11H20V5Z">
                                            </path>
                                        </svg>
                                        <span class="ml-2">
                                            ALL INBOX
                                        </span>
                                    </a>
                                </li>
                                <li wire:click="sidebarLink('Trash')">
                                    <a class="{{ $sidebar == 'Trash' ? 'bg-[#1c4c4e]/90 scale-95 text-white fill-white' : '' }} inline-flex items-center w-full px-4 py-2 mt-1  text-[#1c4c4e] fill-[#1c4c4e] transition duration-200 ease-in-out font-semibold transform rounded-xl focus:shadow-outline hover:bg-[#1c4c4e]/90 hover:scale-95 hover:text-white hover:fill-white"
                                        href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M4 8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8ZM6 10V20H18V10H6ZM9 12H11V18H9V12ZM13 12H15V18H13V12ZM7 5V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V5H22V7H2V5H7ZM9 4V5H15V4H9Z">
                                            </path>
                                        </svg>
                                        <span class="ml-2">
                                            TRASH
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
        <div class="flex flex-col flex-1 w-0 overflow-hidden">
            <main class="relative flex-1 overflow-y-auto focus:outline-none">
                <div class="py-6">
                    <div class="px-4 mx-auto 2xl:max-w-7xl sm:px-6 md:px-8">
                        <!-- === Remove and replace with your own content... === -->
                        @if ($compose == true)
                            <div class="py-4">
                                <h1 class="font-bold text-2xl">NEW MESSAGE</h1>
                                <div class="mt-5 grid grid-cols-3 gap-10">
                                    {{-- <div class="flex flex-col space-y-3">
                                        <x-native-select label="Lot" wire:model.defer="lot_number">

                                            <option>Select an option</option>

                                            @for ($i = 1; $i <= 912; $i++)
                                                <option value="{{ $i }}">Room {{ $i }}</option>
                                            @endfor



                                        </x-native-select>
                                        <x-native-select label="Label Type" wire:model.defer="label">
                                            <option>Select an Option</option>
                                            <option value="Complaint">Complaint</option>
                                            <option value="Concerns">Concerns</option>
                                            <option value="Maintenance">Maintenance</option>
                                            <option value="Amenity">Amenity</option>
                                            <option value="Package">Package</option>
                                        </x-native-select>
                                        <x-native-select label="Nature of Complaints" wire:model.defer="complaint">
                                            <option>Select an Option</option>
                                            <option value="Noise">Noise</option>
                                            <option value="Trash">Trash</option>
                                            <option value="Security">Security</option>
                                            <option value="Boundaries">Boundaries</option>
                                            <option value="Rule Violation">Rule Violation</option>

                                        </x-native-select>
                                        <x-input label="Subject" wire:model.defer="subject"
                                            placeholder="subject of the message" />
                                    </div> --}}
                                    <div>
                                        {{ $this->form }}
                                    </div>
                                    <div class="col-span-2 grid grid-cols-2 gap-4">
                                        <div>
                                            <h1 class="text-sm">Resident Name</h1>
                                            <h1 class="uppercase font-bold">{{ $details->firstname ?? '-----' }}
                                                {{ $details->lastname ?? '-----' }}</h1>
                                        </div>
                                        <div class="">
                                            <h1 class="text-sm">Resident Type</h1>
                                            <h1 class="uppercase font-bold">{{ $details->resident_type ?? '-----' }}
                                            </h1>
                                        </div>
                                        <div class="">
                                            <h1 class="text-sm">Gender</h1>
                                            <h1 class="uppercase font-bold">{{ $details->gender ?? '-----' }}</h1>
                                        </div>
                                        <div class="">
                                            <h1 class="text-sm">Mobile Number</h1>
                                            <h1 class="uppercase font-bold">{{ $details->phone_number ?? '-----' }}</h1>
                                        </div>
                                    </div>
                                    <div class="col-span-3 bg-gray-300 p-3 rounded-lg">
                                        <x-textarea label="Compose a Message" wire:model.defer="message"
                                            placeholder="write your message" />
                                        @if ($attachment)
                                            <span class="pl-2">Attachment:</span>
                                            <div class="p-2">
                                                <div class="bg-white w-40 p-1 px-2 truncate rounded-full">
                                                    <p class="truncate text-sm">
                                                        {{ $attachment->getClientOriginalName() }}</p>
                                                </div>
                                            </div>
                                        @endif
                                        <div class=" flex space-x-2  pt-2 items-center">
                                            <x-button label="SEND" wire:click="sendMessage" spinner="sendMessage" dark
                                                right-icon="inbox-in" />
                                            <x-button label="Attach File" id="fileInputButton" dark icon="paper-clip" />
                                            <input id="fileInput" wire:model="attachment" type="file"
                                                style="display: none;">
                                            <script>
                                                const fileInputButton = document.getElementById('fileInputButton');
                                                const fileInput = document.getElementById('fileInput');

                                                fileInputButton.addEventListener('click', () => {
                                                    fileInput.click();
                                                });

                                                fileInput.addEventListener('change', () => {
                                                    const selectedFile = fileInput.files[0];
                                                    // if (selectedFile) {
                                                    //     // Do something with the selected file, e.g., display its name
                                                    //     alert(`Selected file: ${selectedFile.name}`);
                                                    // }
                                                });
                                            </script>



                                        </div>
                                    </div>

                                </div>

                            </div>
                        @else
                            <div class="py-4">

                                <div class="mt-3">
                                    @switch($sidebar)
                                        @case('All Inbox')
                                            {{ $this->table }}
                                        @break

                                        @case('Trash')
                                            <livewire:admin.trash-list />
                                        @break

                                        @case('Sent')
                                            <livewire:admin.sent-list />
                                        @break

                                        @default
                                    @endswitch
                                </div>
                            </div>
                        @endif
                        <!-- === End ===  -->
                    </div>
                </div>
            </main>
        </div>
    </div>

    <x-modal wire:model.defer="view_modal" align="center">
        <x-card title="">
            <div class="flex flex-col space-y-3">
                <h1>Label Type: <span class="font-medium">{{ $message_data->label_type ?? '' }}</span></h1>
                <h1>Nature of Complaint: <span
                        class="font-medium">{{ $message_data->nature_of_complaint ?? '' }}</span>
                </h1>
                <h1>Subject: <span class="font-medium">{{ $message_data->subject ?? '' }}</span>
                </h1>
                <div class="flex space-x-1 ">
                    <h1>Message:</h1>
                    <p>{{ $message_data->message ?? '' }}</p>
                </div>
                @if ($attachment_image)
                    <div>
                        <h1>Attachment:</h1>
                        <img src="{{ Storage::url($attachment_image) }}" class="h-40" alt="">
                    </div>
                @endif
            </div>
            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>
</div>
