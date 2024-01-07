<?php

namespace App\Http\Livewire\Admin;

use App\Models\Maintenance;
use App\Models\Pass;
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

class PassList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return Pass::query();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name')->label('NAME')->searchable(),
        ];

    }

    protected function getTableHeaderActions()
    {
        return [
            Action::make('pass')->label('New Pass')->button()->icon('heroicon-o-plus')->size('sm')->color('gray')
                ->action(function ($record, $data): void {
                    Pass::create([
                        'name' => $data['name'],
                    ]);
                    sweetalert()->addSuccess('Pass has been created');
                })
                ->form([

                    Grid::make(1)
                        ->schema([
                            TextInput::make('name')->label('Name')->required(),

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
                    ]);
                    sweetalert()->addSuccess('Pass has been updated');
                }
            )->form(
                    function ($record) {
                        return [
                            TextInput::make('name')->label('Name')->required(),
                        ];
                    }
                )->modalWidth('xl')->modalHeading('Edit Pass'),
            Tables\Actions\DeleteAction::make(),
        ];
    }



    public function render()
    {
        return view('livewire.admin.pass-list');
    }
}
