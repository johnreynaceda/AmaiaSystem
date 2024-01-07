<?php

namespace App\Exports;

use App\Models\MaintenanceRequest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MaintenanceExport implements FromView
{
    public function view(): View
    {
        return view('export.maintenance', [
            'reports' => MaintenanceRequest::whereMonth('request_date', now()->month)->where('status', '!=', 'completed')->get(),
        ]);
    }
}
