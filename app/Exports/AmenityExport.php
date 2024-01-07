<?php

namespace App\Exports;

use App\Models\AmenityRequest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AmenityExport implements FromView
{
    public function view(): View
    {
        return view('export.amenity', [
            'reports' => AmenityRequest::whereMonth('request_date', now()->month)->where('status', '!=', 'completed')->get(),
        ]);
    }
}
