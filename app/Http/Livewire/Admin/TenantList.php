<?php

namespace App\Http\Livewire\Admin;

use App\Models\UserInformation;
use Filament\Tables\Actions\DeleteAction;
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

class TenantList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return UserInformation::query()->where('resident_type', 'Tenant')->whereHas('user', function ($record) {
            $record->where('status', null)->where('is_accepted', true);
        });
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('user.name')->label('NAME')->searchable(),
            TextColumn::make('resident_type')->label('RESIDENT TYPE')->searchable(),
            TextColumn::make('unit_number')->label('UNIT NO.')->formatStateUsing(
                function ($record) {
                    return 'Room ' . ($record->unit_number ?? 'null');
                }
            )->searchable(),
            TextColumn::make('gender')->label('GENDER')->searchable(),
            TextColumn::make('civil_status')->label('CIVIL STATUS')->searchable(),
            TextColumn::make('phone_number')->label('PHONE NUMBER')->searchable(),
        ];

    }

    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    protected function getTableActions(): array
    {
        return [
            DeleteAction::make('delete')->button()->color('danger')->action(
                function ($record) {
                    $record->user->update([
                        'status' => 'deleted',
                        'email' => $this->generateRandomString(),
                    ]);
                    sweetalert()->addSuccess('User deleted successfully');
                }
            ),
        ];
    }

    public function render()
    {
        return view('livewire.admin.tenant-list');
    }
}
