<div>

    <div class="flex justify-between items-end mt-5">
        <div class="mt-5  space-x-2 hidden 2xl:flex items-center">
            <button wire:click="$set('sort', 'All')"
                class="{{ $sort == 'All' ? 'bg-white' : '' }} border p-2 hover:bg-white rounded-lg flex space-x-2 px-3 font-semibold border-gray-500 text-gray-700">
                <x-badge label="{{ \App\Models\Message::where('receiver_id', auth()->user()->id)->count() }}"
                    class="font-bold" gray />
                <span>All</span>
            </button>
            <button wire:click="$set('sort', 'Unopened')"
                class=" {{ $sort == 'Unopened' ? 'bg-white' : '' }} border p-2 hover:bg-white rounded-lg flex space-x-2 px-3 font-semibold border-gray-500 text-gray-700">
                <x-badge
                    label="{{ \App\Models\Message::where('receiver_id', auth()->user()->id)->where('read_at', null)->count() }}"
                    class="font-bold" gray />
                <span>Unopened</span>
            </button>
            <button wire:click="$set('sort', 'Sent')"
                class=" {{ $sort == 'Sent' ? 'bg-white' : '' }} border p-2 hover:bg-white rounded-lg flex space-x-2 px-3 font-semibold border-gray-500 text-gray-700">
                <x-badge label="{{ \App\Models\Message::where('user_id', auth()->user()->id)->count() }}"
                    class="font-bold" gray />
                <span>Sent</span>
            </button>
        </div>
        <x-native-select class="2xl:hidden" wire:model="sort">
            <option>Select An Option</option>
            <option value="All">All</option>
            <option value="Unopened">Unopened</option>
            <option value="Sent">Sent</option>
        </x-native-select>

        <button wire:click="$set('compose_modal' , true)"
            class="flex space-x-2 items-center border-2 p-1.5 px-3 hover:bg-white border-gray-500 rounded-lg group hover:border-green-700">
            <div class="relative group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 fill-green-500 group-hover:fill-green-700"
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
            </div>
            <span class="font-semibold 2xl:block hidden group-hover:text-green-700">COMPOSE</span>
        </button>
    </div>
    <div class="2xl:mt-5 mt-3">
        @if ($sort == 'Sent')
            <livewire:user.user-sent />
        @else
            {{ $this->table }}
        @endif
    </div>

    <x-modal wire:model.defer="compose_modal" align="center">
        <x-card title="Compose Message">
            <div class="py-2 flex flex-col space-y-3">
                {{ $this->form }}
                <div>
                    @if ($attachment)
                        <span class="pl-2">Attachment:</span>
                        {{-- <div class="">
                            <div
                                class="bg-green-500 w-48  p-1 px-2 truncate rounded-full flex space-x-1 items-center relative">

                                <div class="">
                                    <p class="truncate text-sm w-40">
                                        {{ $attachment->getClientOriginalName() }}</p>
                                </div>
                                <x-badge label="x" xs dark />
                            </div>
                        </div> --}}
                        <div>
                            <x-badge flat class=" truncate" positive label="{{ $attachment->getClientOriginalName() }}">

                                <x-slot name="append" class="relative flex items-center w-2 h-2">

                                    <button type="button" wire:click="removeAttachment">

                                        <x-icon name="x" class="w-4 h-4" />

                                    </button>

                                </x-slot>

                            </x-badge>
                        </div>
                    @endif
                </div>
            </div>

            <x-slot name="footer">
                <div class="flex justify-end gap-x-2">

                    <x-button label="Attach File" id="fileInputButton" spinner="attachment" rounded
                        class="font-semibold" outline positive icon="paper-clip" />
                    <input id="fileInput" wire:model="attachment" type="file" style="display: none;">
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
                    <x-button dark rounded label="SEND" wire:click="sendMessage" class="font-bold"
                        icon="chat-alt-2" />
                </div>

            </x-slot>

        </x-card>

    </x-modal>

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
            <div class="mt-5" x-animate>
                @if ($reply_modal)
                    <div class="border rounded-lg p-2">
                        <x-textarea wire:model="reply_messages" label="Message" />
                        <div>
                            @if ($attachment)
                                <span class="pl-2">Attachment:</span>

                                <div>
                                    <x-badge flat class=" truncate" positive
                                        label="{{ $attachment->getClientOriginalName() }}">

                                        <x-slot name="append" class="relative flex items-center w-2 h-2">

                                            <button type="button" wire:click="removeAttachment">

                                                <x-icon name="x" class="w-4 h-4" />

                                            </button>

                                        </x-slot>

                                    </x-badge>
                                </div>
                            @endif
                        </div>
                        <div class="mt-2 flex space-x-2">
                            <x-button label="Reply" wire:click="replyMessage" spinner="replyMessage" positive
                                right-icon="reply" sm />
                            <x-button label="Cancel" negative sm wire:click="$set('reply_modal', false)" />
                            <x-button label="Attach File" id="fileInputButton" spinner="attachment" rounded
                                class="font-semibold" outline positive icon="paper-clip" />
                            <input id="fileInput" wire:model="attachment" type="file" style="display: none;">
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
                @else
                    <x-button label="Reply to this message" wire:click="$set('reply_modal', true)" dark sm />
                @endif

            </div>
            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" wire:click="closeModal" />

                </div>
            </x-slot>
        </x-card>
    </x-modal>
</div>
