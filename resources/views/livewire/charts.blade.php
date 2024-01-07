<div>
    <div class="mt-10">

        @php
            $maintenance = \App\Models\MaintenanceRequest::count();
            $amenity = \App\Models\AmenityRequest::count();
            $gate = \App\Models\PassRequest::whereHas('pass', function ($record) {
                $record->where('name', 'Gate Pass');
            })->count();
            $visitor = \App\Models\PassRequest::whereHas('pass', function ($record) {
                $record->where('name', 'Visitor Pass');
            })->count();

            $parcel = \App\Models\PassRequest::whereHas('pass', function ($record) {
                $record->where('name', 'Parcel Pass');
            })->count();

            $total_pending = $maintenance + $amenity + $visitor + $parcel + $gate;
        @endphp
        <div class="grid grid-cols-2 gap-5    ">
            <div class="bg-white p-10 rounded-xl bg-opacity-80 ">
                <header class="text-xl font-semibold text-gray-700 uppercase">FREQUENTLY REQUEST ANALYTICS</header>
                <center class=" mt-5">
                    <canvas id="myChart"></canvas>
                </center>
                <script>
                    const ctx = document.getElementById('myChart');

                    new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: ['Maintenance', 'Amenity', 'Gate Pass', 'Visitor Pass', 'Parcel'],
                            datasets: [{
                                data: [{{ $maintenance }}, {{ $amenity }}, {{ $visitor }},
                                    {{ $gate }}, {{ $parcel }}
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>
            </div>
            <div>
                <div class="bg-white p-10 rounded-xl bg-opacity-80 ">
                    <header class="text-xl font-semibold text-gray-700 uppercase">frequently availed maintenance services
                    </header>
                    <center class=" mt-5">
                        <canvas id="maintenanceChart"></canvas>
                    </center>

                    <script>
                        document.addEventListener('livewire:load', function() {
                            const ctx = document.getElementById('maintenanceChart');


                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: @json($maintenanceLabels),
                                    datasets: [{
                                        label: 'Number of Maintenance Records',
                                        data: @json($maintenanceCounts),
                                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                        borderColor: 'rgba(75, 192, 192, 1)',
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        });
                    </script>
                </div>
            </div>
            <div>
                <div class="bg-white p-10 rounded-xl bg-opacity-80 ">
                    <header class="text-xl font-semibold text-gray-700 uppercase">frequently availed Amenity
                        services
                    </header>
                    <center class=" mt-5">
                        <canvas id="amenityChart"></canvas>
                    </center>

                    <script>
                        document.addEventListener('livewire:load', function() {
                            const ctx = document.getElementById('amenityChart');


                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: @json($amenityLabels),
                                    datasets: [{
                                        label: 'Number of Amenity Records',
                                        data: @json($amenityCounts),
                                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                        borderColor: 'rgba(75, 192, 192, 1)',
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
