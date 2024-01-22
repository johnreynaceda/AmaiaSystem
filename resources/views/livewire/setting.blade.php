<div wire:ignore>
    @if (request()->routeIs('admin.settings'))
        <div class="bg-white p-10 bg-opacity-70 rounded-xl">
            {{ $this->form }}
            <x-button dark right-icon="save" label="Save" wire:click="save" class="mt-5" spinner="save" />
        </div>
    @endif
    <x-modal.card title="Settings" blur wire:model.defer="setting_modal">
        <div>
            {{ $this->form }}
        </div>
        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">


                <div class="flex">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button dark right-icon="save" label="Save" wire:click="save" spinner="save" />
                </div>
            </div>
        </x-slot>
    </x-modal.card>
</div>
