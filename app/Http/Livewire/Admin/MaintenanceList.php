<?php

namespace App\Http\Livewire\Admin;

use App\Models\Maintenance;
use Livewire\Component;
use App\Models\Post;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;

class MaintenanceList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return Maintenance::query();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name')->label('NAME')->searchable(),
            TextColumn::make('description')->label('DESCRIPTION')->searchable(),

        ];

    }

    protected function getTableHeaderActions()
    {
        return [
            Action::make('maintenance')->label('New Maintenance')->button()->icon('heroicon-o-plus')->size('sm')->color('gray')
                ->action(function ($record, $data): void {
                    Maintenance::create([
                        'name' => $data['name'],
                        'description' => $data['description'],
                    ]);
                    sweetalert()->addSuccess('Maintenance has been created');
                })
                ->form([

                    Grid::make(1)
                        ->schema([
                            TextInput::make('name')->label('Name')->required(),
                            TextInput::make('description')->label('Description')->required(),

                        ])
                ])->modalWidth('xl')
        ];

    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\EditAction::make()->action(
                function ($record, $data) {
                    $record->update([
                        'name' => $data['name'],
                        'description' => $data['description'],
                    ]);
                    sweetalert()->addSuccess('Maintenance has been updated');
                }
            )->form(
                    function ($record) {
                        return [
                            TextInput::make('name')->label('Name')->required(),
                            TextInput::make('description')->label('Description')->required(),
                        ];
                    }
                )->modalWidth('xl')->modalHeading('Edit Maintenance'),
            Tables\Actions\DeleteAction::make(),
        ];
    }


    public function render()
    {
        return view('livewire.admin.maintenance-list');
    }
}
