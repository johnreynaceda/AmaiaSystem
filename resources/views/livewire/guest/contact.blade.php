<div>
    <p class="text-center 2xl:text-xl ">For assistance, queries/concerns,
        you may get in
        touch with us through these numbers:</p>

    <h1 class="mt-5 font-bold text-green-600 2xl:text-2xl text-xl text-center">ACTION FORM</h1>
    <div class="mt-3 p-2 2xl:p-10 bg-white bg-opacity-80 rounded-xl py-5">
        <div>
            {{ $this->form }}
        </div>
        <div class="mt-5">
            <x-button label="Submit" teal class="font-semibold" wire:click="submitComplaint" spinner="submitComplaint"
                right-icon="arrow-right" />
        </div>
    </div>

</div>
