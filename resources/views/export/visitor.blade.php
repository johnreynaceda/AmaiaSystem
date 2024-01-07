<div>
    <table id="example" class="table-auto mt-5" style="width:100%">
        <thead class="font-normal">
            <tr>
                <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                    TYPE </th>
                <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                    UNIT
                </th>
                <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                    VISITOR NAME
                </th>
                <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                    RELATION
                </th>
                <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                    REQUESTED DATE
                </th>
                <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                    PREFFERED TIME
                </th>

            </tr>
        </thead>
        <tbody class="">
            @forelse ($reports as $report)
                <tr>
                    <td class="border-2  text-gray-700  px-3 py-1">
                        {{ $report->pass->name }}
                    </td>
                    <td class="border-2  text-gray-700  px-3 py-1">
                        {{ $report->user->user_information->unit_number }}
                    </td>
                    <td class="border-2  text-gray-700  px-3 py-1">
                        {{ $report->user->name }}
                    </td>
                    <td class="border-2  text-gray-700  px-3 py-1">
                        {{ $report->relation }}
                    </td>
                    <td class="border-2  text-gray-700  px-3 py-1">
                        {{ \Carbon\Carbon::parse($report->request_date)->format('F m, Y') }}
                    </td>
                    <td class="border-2  text-gray-700  px-3 py-1">
                        {{ \Carbon\Carbon::parse($report->request_date)->format('H:i A') }}
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</div>
