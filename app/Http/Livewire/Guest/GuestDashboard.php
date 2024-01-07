<?php

namespace App\Http\Livewire\Guest;

use App\Models\AmenityRequest;
use App\Models\MaintenanceRequest;
use App\Models\PassRequest;
use Livewire\Component;
use Livewire\WithPagination;


class GuestDashboard extends Component
{
    use WithPagination;
    public $transaction;
    public function render()
    {
        return view('livewire.guest.guest-dashboard', [
            'transactions' => $this->generateTransaction(),
        ]);


    }

    public function generateTransaction()
    {
        if ($this->transaction == 1) {
            return MaintenanceRequest::where('user_id', auth()->user()->id)->orderByRaw("
            CASE
                WHEN status = 'pending' THEN 1
                WHEN status = 'approved' THEN 2
                WHEN status = 'completed' THEN 3
                ELSE 4
            END
        ")->get();
        } elseif ($this->transaction == 2) {
            return AmenityRequest::where('user_id', auth()->user()->id)->orderByRaw("
            CASE
                WHEN status = 'pending' THEN 1
                WHEN status = 'approved' THEN 2
                WHEN status = 'completed' THEN 3
                ELSE 4
            END
        ")->get();
        } elseif ($this->transaction == 3) {
            return PassRequest::where('user_id', auth()->user()->id)->whereHas('pass', function ($record) {
                $record->where('name', 'like', '%' . 'Gate Pass' . '%');
            })->orderByRaw("
            CASE
                WHEN status = 'pending' THEN 1
                WHEN status = 'approved' THEN 2
                WHEN status = 'completed' THEN 3
                ELSE 4
            END
        ")->paginate(5);
        } elseif ($this->transaction == 4) {
            return PassRequest::where('user_id', auth()->user()->id)->whereHas('pass', function ($record) {
                $record->where('name', 'like', '%' . 'Visitor Pass' . '%');
            })->orderByRaw("
            CASE
                WHEN status = 'pending' THEN 1
                WHEN status = 'approved' THEN 2
                WHEN status = 'completed' THEN 3
                ELSE 4
            END
        ")->paginate(5);
        } elseif ($this->transaction == 5) {
            return PassRequest::where('user_id', auth()->user()->id)->whereHas('pass', function ($record) {
                $record->where('name', 'like', '%' . 'Parcel Pass' . '%');
            })->orderByRaw("
            CASE
                WHEN status = 'pending' THEN 1
                WHEN status = 'approved' THEN 2
                WHEN status = 'completed' THEN 3
                ELSE 4
            END
        ")->paginate(5);
        }
    }
}