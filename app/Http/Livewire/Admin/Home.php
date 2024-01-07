<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;

class Home extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return User::query()->where('status', null)->where('is_accepted', false)->where('is_admin', false);
    }
    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name')->label('NAME')->searchable(),
            TextColumn::make('user_information.resident_type')->label('RESIDENT TYPE')->searchable(),
            TextColumn::make('user_information.unit_number')->label('UNIT NO.')->formatStateUsing(
                function ($record) {
                    return 'Room ' . ($record->user_information->unit_number ?? 'null');
                }
            )->searchable(),
            TextColumn::make('user_information.date_of_birth')->date()->label('BIRTHDATE')->searchable(),
            TextColumn::make('user_information.gender')->label('GENDER')->searchable(),
            TextColumn::make('user_information.civil_status')->label('CIVIL STATUS')->searchable(),
            TextColumn::make('user_information.phone_number')->label('PHONE NUMBER')->searchable(),

        ];

    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\ActionGroup::make([
                Action::make('accept')->button()->icon('heroicon-o-thumb-up')->color('primary')->action(
                    function ($record) {
                        $record->update([
                            'is_accepted' => true
                        ]);
                        sweetalert()->addSuccess('User successfully updated');
                    }
                ),
                Action::make('decline')->button()->icon('heroicon-o-thumb-down')->color('danger')->action(
                    function ($record) {
                        $record->update([

                            'status' => 'declined',
                        ]);
                        sweetalert()->addSuccess('User declined successfully');
                    }
                ),

            ]),
        ];
    }

    public function render()
    {
        return view('livewire.admin.home');
    }
}
