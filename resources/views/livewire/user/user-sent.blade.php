<div>
    {{ $this->table }}

    <x-modal wire:model.defer="view_modal" align="center">
        <x-card title="">
            <div class="flex flex-col space-y-3">
                <h1>Label Type: <span class="font-medium">{{ $message_data->label_type ?? '' }}</span></h1>
                <h1>Nature of Complaint: <span class="font-medium">{{ $message_data->nature_of_complaint ?? '' }}</span>
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
