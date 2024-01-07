<?php

namespace App\Http\Livewire\Guest;

use App\Models\UserInformation;
use Livewire\Component;

class Analytic extends Component
{
    public $active = 'rate';
    public $data;
    public $rate;
    public $selected_month;
    public $highest;
    public $lowest;


    public function render()
    {
        $months = [];
        $counts = [];

        UserInformation::whereNotNull('turn_over_date')
            ->selectRaw('COUNT(*) as count, MONTH(turn_over_date) as month')
            ->groupBy('month')
            ->get()
            ->each(function ($item) use (&$months, &$counts) {
                $monthName = \Carbon\Carbon::create()->month($item->month)->format('F');
                $months[] = $monthName;
                $counts[] = $item->count;
            });

        $maxCount = max($counts);
        $highestOccupancyMonthIndex = array_search($maxCount, $counts);
        $highestOccupancyMonth = $months[$highestOccupancyMonthIndex];

        $minCount = min($counts);


        $lowestOccupancyMonthIndex = array_search($minCount, $counts);
        $lowestOccupancyMonth = $months[$lowestOccupancyMonthIndex];


        $this->highest = $highestOccupancyMonth;
        $this->lowest = $lowestOccupancyMonth;
        $this->rate = [
            'labels' => $months,
            'data' => $counts,
        ];
        return view('livewire.guest.analytic', [
            'occupied_unit' => $this->selected_month != null ? UserInformation::whereNotNull('turn_over_date')->whereMonth('turn_over_date', $this->selected_month)->count() : 0
        ]);
    }
}
