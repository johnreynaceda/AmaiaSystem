<div>
    <div>
        {{ $this->form }}
    </div>
    <div class="flex flex-col 2xl:flex-none  mt-4 2xl:justify-between items-center">
        <div>
            <p class="text-green-700 text-center">By registering an account with Amaia Skies, you agree to provide
                accurate and complete information and to keep your account credentials secure.
            </p>
        </div>
        <x-button label="VIEW TERMS AND AGREEMENTS" wire:click="$set('view_term', true)" dark class="w-40  mt-3" />
    </div>
    <div class="mt-5 flex space-x-2">
        <x-button label="Register" wire:click="registerUser" spinner="registerUser" positive class="font-bold" />
        <x-button label="Cancel" href="/" negative class="font-bold" />
    </div>

    <x-modal blur wire:model.defer="view_term" align="center">
        <div>
            <img src="{{ asset('images/files/Profile Terms and Agreement_.jpg') }}"
                class="2xl:h-[40rem] h-[30rem] object-cover" alt="">
        </div>
    </x-modal>
</div>
