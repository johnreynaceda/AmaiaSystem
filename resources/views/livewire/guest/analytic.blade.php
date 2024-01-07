<div>
    <div class="mb-10 flex space-x-2">
        <x-button href="{{ route('guest.about') }}" label="OCCUPANCY RATE" dark class="font-bold" />
        <x-button href="{{ route('guest.satisfaction') }}" label="RESIDENT SATISFACTION" dark outline class="font-bold" />

    </div>
    <div x-animate>
        @if ($active == 'rate')
            <h1 class="text-2xl font-bold text-gray-700">OCCUPANCY RATE</h1>
            <div wire:ignore class="div bg-white mt-2 rounded-xl p-1 2xl:p-5">
                <canvas id="myLineChart" width="400" height="200"></canvas>
            </div>
            <div class="mt-3">
                <p class="text-sm 2xl:text-base">
                    This report presents a monthly analysis of occupancy rates at Amaia Skies for the year 2022. The
                    data
                    reveals
                    fluctuations in occupancy rates, allowing for insights into the property's performance and potential
                    areas
                    of
                    improvement.
                </p>
            </div>

            <div class="mt-5">
                <h1 class="text-lg font-bold underline text-gray-700">Monthly Occupancy Rates</h1>
                <div class="2xl:w-96 ">
                    <x-native-select label="For the month of:" wire:model="selected_month">
                        <option>Select An Option</option>
                        <option value="1">January {{ \Carbon\Carbon::now()->format('Y') }}</option>
                        <option value="2">February {{ \Carbon\Carbon::now()->format('Y') }}</option>
                        <option value="3">March {{ \Carbon\Carbon::now()->format('Y') }}</option>
                        <option value="4">April {{ \Carbon\Carbon::now()->format('Y') }}</option>
                        <option value="5">May {{ \Carbon\Carbon::now()->format('Y') }}</option>
                        <option value="6">June {{ \Carbon\Carbon::now()->format('Y') }}</option>
                        <option value="7">July {{ \Carbon\Carbon::now()->format('Y') }}</option>
                        <option value="8">August {{ \Carbon\Carbon::now()->format('Y') }}</option>
                        <option value="9">September {{ \Carbon\Carbon::now()->format('Y') }}</option>
                        <option value="10">October {{ \Carbon\Carbon::now()->format('Y') }}</option>
                        <option value="11">November {{ \Carbon\Carbon::now()->format('Y') }}</option>
                        <option value="12">December {{ \Carbon\Carbon::now()->format('Y') }}</option>
                    </x-native-select>
                </div>
                <div class="mt-3 flex flex-col space-y-2">
                    <span class="font-bold text-gray-700">Total Units: <span class="text-red-600 ">912</span></span>
                    <span class="font-bold text-gray-700">Occupied Units: <span
                            class="text-red-600 ">{{ $occupied_unit }}</span></span>
                    <span class="font-bold text-gray-700">Vacant Units: <span
                            class="text-red-600 ">{{ $selected_month != null ? 912 - $occupied_unit : 0 }}</span></span>
                    <span class="font-bold text-gray-700">Occupancy Rate: <span
                            class="text-red-600 ">{{ $selected_month != null ? ($occupied_unit / (912 - $occupied_unit)) * 100 : 0 }}%</span></span>
                </div>
            </div>
            <div class="mt-5">
                <h1 class="text-lg underline font-bold text-gray-700">Year-to-Date Summary (Recent Year)</h1>
                <div class="mt-3 flex flex-col space-y-2">

                    <span class="font-bold text-gray-700">Highest Occupancy Rate: <span
                            class="text-red-600 ">{{ $highest }}</span></span>
                    <span class="font-bold text-gray-700">Lowest Occupancy Rate: <span
                            class="text-red-600 ">{{ $lowest }}</span></span>
                </div>
            </div>
        @else
        @endif
    </div>
    @push('scripts')
        <script>
            // Populate data from the server
            var labels = @json($rate['labels']);
            var data = @json($rate['data']);

            // Create a line chart
            var ctx = document.getElementById('myLineChart').getContext('2d');
            var myLineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: {{ \Carbon\Carbon::now()->format('Y') }},
                        data: data,
                        backgroundColor: '#1c4c4e',
                        borderColor: '#1c4c4e',
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
    @endpush
</div>
