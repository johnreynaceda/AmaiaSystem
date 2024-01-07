@if ($getRecord()->label_type == 'Complaint' || $getRecord()->label_type == 'Concerns')
    <p class="text-center 2xl:text-base text-xs">Admin has sent you a Complaint/Concern about <span
            class="text-red-500 uppercase font-semibold">{{ $getRecord()->nature_of_complaint }}</span> and they would
        like you to address it as soon as possible. </p>
@else
    <p class="text-center 2xl:text-base text-xs">{{ $getRecord()->message }}</p>
@endif
