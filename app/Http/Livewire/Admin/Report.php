<?php

namespace App\Http\Livewire\Admin;

use App\Exports\AmenityExport;
use App\Exports\GateExport;
use App\Exports\MaintenanceExport;
use App\Exports\ParcelExport;
use App\Exports\VisitorExport;
use App\Models\AmenityRequest;
use App\Models\MaintenanceRequest;
use App\Models\Pass;
use App\Models\PassRequest;
use Carbon\Carbon;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class Report extends Component
{
    public $type;
    public function render()
    {
        return view('livewire.admin.report', [
            'reports' => $this->generateQuery(),
        ]);
    }

    public function generateQuery()
    {
        if ($this->type == 1) {
            return MaintenanceRequest::whereMonth('request_date', now()->month)->whereIn('status', ['completed', 'pending', 'approved'])->get();
        } elseif ($this->type == 2) {
            return AmenityRequest::whereMonth('request_date', now()->month)->whereIn('status', ['completed', 'pending', 'approved'])->get();
        } elseif ($this->type == 3) {
            return PassRequest::where('pass_id', Pass::where('name', 'like', '%' . 'Gate Pass' . '%')->first()->id)->whereMonth('request_date', now()->month)->whereIn('status', ['completed', 'pending', 'approved'])->get();
        } elseif ($this->type == 4) {
            return PassRequest::where('pass_id', Pass::where('name', 'like', '%' . 'Visitor Pass' . '%')->first()->id)->whereMonth('request_date', now()->month)->whereIn('status', ['completed', 'pending', 'approved'])->get();
        } elseif ($this->type == 5) {
            return PassRequest::where('pass_id', Pass::where('name', 'like', '%' . 'Parcel Pass' . '%')->first()->id)->whereMonth('request_date', now()->month)->whereIn('status', ['completed', 'pending', 'approved'])->get();
        } else {

        }
    }

    public function download()
    {
        if ($this->type == 1) {
            return Excel::download(new MaintenanceExport, 'maintenance.xlsx');
        } elseif ($this->type == 2) {
            return Excel::download(new AmenityExport, 'amenity.xlsx');
        } elseif ($this->type == 3) {
            return Excel::download(new GateExport, 'gate.xlsx');
        } elseif ($this->type == 4) {
            return Excel::download(new VisitorExport, 'visitor.xlsx');
        } elseif ($this->type == 5) {
            return Excel::download(new ParcelExport, 'parcel.xlsx');
        } else {

        }
    }
}
