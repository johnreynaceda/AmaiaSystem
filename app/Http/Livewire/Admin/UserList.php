<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
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

class UserList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return User::query()->where('id', '!=', 1)->where('is_accepted', true);
    }
    public function render()
    {
        return view('livewire.admin.user-list');
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name')->label('NAME')->searchable(),
            TextColumn::make('email')->label('EMAIL')->searchable(),
        ];

    }
}
