<?php

namespace App\Http\Livewire\Guest;

use App\Models\Complaint;
use Livewire\Component;
use Filament\Forms;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class Contact extends Component implements Forms\Contracts\HasForms
{

    use Forms\Concerns\InteractsWithForms;
    public $complaints, $date_of_complaint, $unit, $complaint;

    protected function getFormSchema(): array
    {
        return [
            Select::make('complaints')->required()
                ->options([
                    'Trash' => 'Trash',
                    'Security' => 'Security',
                    'Boundaries' => 'Boundaries',
                    'Rule Violation' => 'Rule Violation'
                ]),
            DatePicker::make('date_of_complaint'),
            TextInput::make('unit')->numeric()->label('Unit Number')->required(),
            Textarea::make('complaint')->label('What is your Complaint')->required(),
        ];
    }

    public function submitComplaint()
    {
        $this->validate([
            'complaints' => 'required',
            'date_of_complaint' => 'required',
            'unit' => 'required',
            'complaint' => 'required',
        ]);

        Complaint::create([
            'user_id' => auth()->user()->id,
            'type' => $this->complaints,
            'complaint_date' => $this->date_of_complaint,
            'unit' => $this->unit,
            'description' => $this->complaint,
        ]);
        sweetalert()->addSuccess('Complaint has been Submitted');
        $this->reset('complaints', 'date_of_complaint', 'unit', 'complaint');
    }

    public function render()
    {
        return view('livewire.guest.contact');
    }
}
