@section('title', 'Reports')
<x-admin-layout>
    <div>
        <livewire:admin.report />

    </div>
    <script>
        function printOut(data) {
            var mywindow = window.open('', '', 'height=1000,width=1000');
            mywindow.document.head.innerHTML =
                '<title></title><link rel="stylesheet" href="{{ Vite::asset('resources/css/app.css') }}" />';
            mywindow.document.body.innerHTML = '<body>' + data + '</body>';

            mywindow.document.close();
            mywindow.focus(); // necessary for IE >= 10
            setTimeout(() => {
                mywindow.print();
                return true;
            }, 1000);




        }
    </script>
</x-admin-layout>
