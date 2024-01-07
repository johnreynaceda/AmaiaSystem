<?php

namespace App\Http\Livewire\Admin;

use App\Models\Maintenance;
use App\Models\MaintenanceRequest;
use App\Models\UserInformation;
use Livewire\Component;
use Filament\Forms;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Grid;
use Filament\Tables;
// use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class UserRequest extends Component implements Tables\Contracts\HasTable
{

    use Tables\Concerns\InteractsWithTable;
    public $unit_number;
    public $request;
    public $requestor_data;


    protected function getFormSchema(): array
    {
        return [
            Grid::make(3)
                ->schema([
                    Select::make('request')->label('Type of Request')->searchable()->reactive()
                        ->options([
                            1 => 'Maintenance',
                            2 => 'Amenities',
                            3 => 'Gate Pass',
                            4 => 'Visitor Pass',
                            5 => 'Parcel Pass',
                        ])
                ])

        ];
    }

    public function updatedUnitNumber()
    {
        $this->requestor_data = UserInformation::where('unit_number', '=', $this->unit_number)->first();
    }





    public function render()
    {
        return view('livewire.admin.user-request');
    }
}
