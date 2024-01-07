<?php

namespace App\Http\Livewire;

use App\Models\Amenity;
use App\Models\AmenityRequest;
use App\Models\Maintenance;
use App\Models\MaintenanceRequest;
use Livewire\Component;

class Charts extends Component
{
    public $maintenanceLabels = [];
    public $maintenanceCounts = [];


    public $amenityLabels = [];
    public $amenityCounts = [];
    public function render()
    {

        $maintenanceData = Maintenance::withCount('maintenance_requests')->get();

        $this->maintenanceLabels = $maintenanceData->pluck('name');
        $this->maintenanceCounts = $maintenanceData->pluck('maintenance_requests_count');




        $amenityData = Amenity::withCount('amenity_requests')->get();

        $this->amenityLabels = $amenityData->pluck('name');
        $this->amenityCounts = $amenityData->pluck('amenity_requests_count');


        return view('livewire.charts');
    }
}
