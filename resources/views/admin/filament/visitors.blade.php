<div class="ml-3">
    <x-button label="View Visitor" wire:click="$set('view_visitor', true)" sm icon="eye" dark />

    <x-modal wire:model.defer="view_visitor" align="center">
        <x-card title="Registered Visitors">
            <p class="text-gray-600">
                {{ $getRecord()->visitors }}
            </p>
            <div class="mt-5">
                @if ($getRecord()->attachment_path != null)
                    <h1>Attachment:</h1>
                    <a class="mt-2 hover:text-green-600" href="{{ Storage::url($getRecord()->attachment_path) }}"
                        target="_blank">{{ Storage::url($getRecord()->attachment_path) }}</a>
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
