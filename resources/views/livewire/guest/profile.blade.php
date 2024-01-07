<div>
    <div>
        {{ $this->form }}
    </div>
    <div class="mt-5 flex space-x-2">
        <x-button label="Submit" wire:click="submitProfile" spinner="submitProfile" positive class="font-bold" />
        <x-button label="Cancel" negative class="font-bold" />
    </div>
</div>
