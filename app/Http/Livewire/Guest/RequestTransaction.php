<?php

namespace App\Http\Livewire\Guest;

use App\Mail\GateMail;
use App\Mail\ParcelMail;
use App\Mail\VisitorMail;
use App\Models\Amenity;
use App\Models\AmenityRequest;
use App\Models\Maintenance;
use App\Models\MaintenanceRequest;
use App\Models\Pass;
use App\Models\PassRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Filament\Forms;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Grid;
use Livewire\WithFileUploads;


class RequestTransaction extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;
    use WithFileUploads;

    public $maintenance_id, $request_date, $request_time, $request, $amount = 0;

    public $amenity_type, $ocassion, $total_persons, $remarks;

    public $visitor, $building, $unit, $particulars, $quantity, $purpose, $attachment, $email;

    public $relation, $contact, $reason;
    public $view_form = false;
    public $amenity_form = false;

    public $gate_form = false;
    public $visitor_form = false;
    public $visitor_clause = false;
    public function render()
    {
        return view('livewire.guest.request-transaction', [
            'maintenances' => Maintenance::get(),
            'amenities' => Amenity::get(),
        ]);
    }



    protected function getFormSchema(): array
    {
        return [
            Grid::make(2)
                ->schema([
                    Select::make('request')->label('Request Type')->reactive()
                        ->options([
                            'Maintenance' => 'Maintenance',
                            'Amenities' => 'Amenities',
                            'Gate Pass' => 'Gate Pass',
                            'Visitor Pass' => 'Visitor Pass',
                            'Parcel Pass' => 'Parcel Pass',
                        ])
                ])

        ];
    }

    public function updatedAmenityType()
    {

        $data = Amenity::where('id', $this->amenity_type)->first();
        $this->amount = $data->amount;
    }

    public function submitMaintenance()
    {
        $this->validate([
            'maintenance_id' => 'required',
            'request_date' => 'required',
            'request' => 'required',
        ]);

        MaintenanceRequest::create([
            'user_id' => auth()->user()->id,
            'transaction_number' => 'TRM' . now()->format('Ymd') . '' . MaintenanceRequest::count() + 1,
            'maintenance_id' => $this->maintenance_id,
            'request_date' => Carbon::parse($this->request_date),
        ]);

        sweetalert()->addSuccess('Request Submitted');

        return redirect()->route('guest.requests');
    }

    public function submitAmenities()
    {
        if ($this->amenity_type == Amenity::where('name', 'like', '%' . 'Function Room' . '%')->first()->id) {
            if ($this->total_persons > 10) {
                $this->validate([
                    'amenity_type' => 'required',
                    'ocassion' => 'required',
                    'remarks' => 'required',
                    'total_persons' => 'required',
                    'request_date' => 'required',
                    'request' => 'required',
                    'attachment' => 'required',
                ]);
                AmenityRequest::create([
                    'user_id' => auth()->user()->id,
                    'transaction_number' => 'TRA' . now()->format('Ymd') . '' . AmenityRequest::count() + 1,
                    'amenity_id' => $this->amenity_type,
                    'request_date' => Carbon::parse($this->request_date),
                    'remark' => $this->remarks,
                    'no_of_person' => $this->total_persons,
                    'amount' => $this->amount,
                    // 'visitors' => $this->visitor,
                    'attachment_path' => $this->attachment->store('AmenityUpload', 'public'),
                ]);
            } else {
                $this->validate([
                    'amenity_type' => 'required',
                    'ocassion' => 'required',
                    'remarks' => 'required',
                    'total_persons' => 'required',
                    'request_date' => 'required',
                    'request' => 'required',
                    'visitor' => 'required',

                ]);
                AmenityRequest::create([
                    'user_id' => auth()->user()->id,
                    'transaction_number' => 'TRA' . now()->format('Ymd') . '' . AmenityRequest::count() + 1,
                    'amenity_id' => $this->amenity_type,
                    'request_date' => Carbon::parse($this->request_date),
                    'remark' => $this->remarks,
                    'no_of_person' => $this->total_persons,
                    'amount' => $this->amount,
                    'visitors' => $this->visitor,
                    // 'attachment_path' => $this->attachment->store('AmenityUpload', 'public'),
                ]);
            }
        } else {
            $this->validate([
                'amenity_type' => 'required',
                'ocassion' => 'required',
                'remarks' => 'required',
                'total_persons' => $this->amenity_type == Amenity::where('name', 'like', '%' . 'Swimming Pool' . '%')->first()->id ? 'required|integer|max:3' : 'required',
                'request_date' => 'required',
                'request' => 'required',
                'visitor' => 'required',

            ]);
            AmenityRequest::create([
                'user_id' => auth()->user()->id,
                'transaction_number' => 'TRA' . now()->format('Ymd') . '' . AmenityRequest::count() + 1,
                'amenity_id' => $this->amenity_type,
                'request_date' => Carbon::parse($this->request_date),
                'remark' => $this->remarks,
                'no_of_person' => $this->total_persons,
                'amount' => $this->amount,
                'visitors' => $this->visitor,
                // 'attachment_path' => $this->attachment->store('AmenityUpload', 'public'),
            ]);

        }



        sweetalert()->addSuccess('Request Submitted');

        return redirect()->route('guest.requests');
    }

    public function submitAmenity()
    {

        AmenityRequest::create([
            'transaction_number' => 'TR' . now()->format('Ymd') . '' . AmenityRequest::count() + 1,
            'user_id' => auth()->user()->id,
            'amenity_id' => $this->amenity_type,
            'request_date' => Carbon::parse($this->request_date),
            'remark' => $this->remarks,
            'no_of_person' => $this->total_persons,
            'amount' => $this->amount,
            'visitors' => $this->visitor,
            'attachment_path' => $this->attachment->store('AmenityUpload', 'public'),
        ]);
        sweetalert()->addSuccess('Request Submitted');

        return redirect()->route('guest.requests');
    }

    public function submitGatePass()
    {

        $this->validate([
            'visitor' => 'required',
            'building' => 'required',
            'unit' => 'required',
            'email' => 'required',
            'purpose' => 'required',
            'particulars' => 'required',
            'quantity' => 'required',
            'request_date' => 'required',
        ]);
        $data = Pass::where('name', 'like', '%' . 'Gate Pass' . '%')->first();

        PassRequest::create([
            'user_id' => auth()->user()->id,
            'transaction_number' => 'G-' . now()->format('Ymd') . '' . PassRequest::count() + 1,
            'pass_id' => $data->id,
            'email' => $this->email,
            'visitor_name' => $this->visitor,
            'building' => $this->building,
            'unit' => $this->unit,
            'purpose' => $this->purpose,
            'particulars' => $this->particulars,
            'quantity' => $this->quantity,
            'request_date' => Carbon::parse($this->request_date),
        ]);
        Mail::to($this->email)->send(new GateMail($this->visitor, $this->purpose, Carbon::parse($this->request_date)->format('F d, Y'), Carbon::parse($this->request_date)->format('h:i A')));
        sleep(2);
        sweetalert()->addSuccess('Request Submitted');

        return redirect()->route('guest.requests');
    }

    public function submitVisitorPass()
    {

        $this->validate([
            'visitor' => 'required',
            'unit' => 'required',
            'email' => 'required',
            'relation' => 'required',
            'request_date' => 'required',
        ]);
        $data = Pass::where('name', 'like', '%' . 'Visitor Pass' . '%')->first();

        PassRequest::create([
            'user_id' => auth()->user()->id,
            'transaction_number' => 'V-' . now()->format('Ymd') . '' . PassRequest::count() + 1,
            'pass_id' => $data->id,
            'email' => $this->email,
            'visitor_name' => $this->visitor,
            'unit' => $this->unit,
            'relation' => $this->relation,
            'request_date' => Carbon::parse($this->request_date),

        ]);
        Mail::to($this->email)->send(new VisitorMail($this->visitor, Carbon::parse($this->request_date)->format('F d, Y'), $this->unit));
        sleep(2);
        sweetalert()->addSuccess('Request Submitted');

        return redirect()->route('guest.requests');
    }

    public function submitParcelPass()
    {

        $this->validate([
            'contact' => 'required',
            'quantity' => 'required',
            'email' => 'required',
            'reason' => 'required',
            'request_date' => 'required',
        ]);
        $data = Pass::where('name', 'like', '%' . 'Parcel Pass' . '%')->first();

        PassRequest::create([
            'user_id' => auth()->user()->id,
            'transaction_number' => 'P-' . now()->format('Ymd') . '' . PassRequest::count() + 1,
            'pass_id' => $data->id,
            'email' => $this->email,
            'contact_number' => $this->contact,
            'quantity' => $this->quantity,
            'purpose' => $this->reason,
            'request_date' => Carbon::parse($this->request_date),

        ]);
        Mail::to($this->email)->send(new ParcelMail($this->visitor, Carbon::parse($this->request_date)->format('F d, Y'), Carbon::parse($this->request_date)->format('h:i A'), $this->reason));
        sleep(2);
        sweetalert()->addSuccess('Request Submitted');

        return redirect()->route('guest.requests');
    }
}
