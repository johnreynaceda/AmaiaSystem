<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Message;
use App\Models\UserInformation;
use App\Models\Post;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Livewire\WithFileUploads;
use Filament\Tables\Columns\SelectColumn;

class TrashList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return Message::query()->where('receiver_id', auth()->user()->id)->where('status', 'deleted');
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('resident_name')->label('RESIDENT NAME')->searchable(),
            TextColumn::make('complainee_unit')->label('UNIT')->searchable(),
            TextColumn::make('nature_of_complaint')->label('NATURE COMPLAINT')->searchable(),
            TextColumn::make('created_at')->date()->label('DATE OF COMPLAINT')->searchable(),
            TextColumn::make('message')->label('MESSAGE')->searchable()->words(3),
            TextColumn::make('date_completed')->date()->label('DATE COMPLETED')->searchable(),


        ];

    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\Action::make('undo')->label('Undo')->button()->icon('heroicon-o-reply')->color('primary')->action(
                function ($record) {
                    $record->update([
                        'status' => 'active',
                    ]);
                    sweetalert()->addSuccess('Message Undo');
                }
            ),
        ];
    }

    public function render()
    {
        return view('livewire.admin.trash-list');
    }
}
