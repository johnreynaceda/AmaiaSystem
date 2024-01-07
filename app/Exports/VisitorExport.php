<?php

namespace App\Exports;

use App\Models\Pass;
use App\Models\PassRequest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class VisitorExport implements FromView
{
    public function view(): View
    {
        return view('export.visitor', [
            'reports' => PassRequest::where('pass_id', Pass::where('name', 'like', '%' . 'Visitor Pass' . '%')->first()->id)->whereMonth('request_date', now()->month)->where('status', '!=', 'completed')->get(),
        ]);
    }
}
