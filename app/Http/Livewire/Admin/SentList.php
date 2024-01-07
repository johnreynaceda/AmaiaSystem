<?php

namespace App\Http\Livewire\Admin;

use App\Models\MessageAttachment;
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

class SentList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    public $attachment_image;
    public $view_modal = false;
    public $has_attachment = false;

    public $message_data;

    protected function getTableQuery(): Builder
    {
        return Message::query()->where('user_id', auth()->user()->id);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('resident_name')->label('RESIDENT NAME')->searchable(),
            TextColumn::make('complainee_unit')->label('UNIT')->searchable(),
            TextColumn::make('nature_of_complaint')->label('NATURE COMPLAINT')->searchable(),
            TextColumn::make('created_at')->date()->label('DATE OF COMPLAINT')->searchable(),
            TextColumn::make('message')->label('MESSAGE')->searchable()->words(3),


        ];

    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\ActionGroup::make([

                Tables\Actions\Action::make('view')->label('View Message')->icon('heroicon-o-eye')->color('warning')->action(
                    function ($record) {
                        $record->update([
                            'read_at' => now(),
                        ]);
                        if (MessageAttachment::where('message_id', $record->id)->count() > 0) {
                            $this->attachment_image = MessageAttachment::where('message_id', $record->id)->first()->file_path;
                        }
                        $this->message_data = $record;
                        $this->view_modal = true;


                    }
                ),
            ]),
        ];
    }
    public function render()
    {
        return view('livewire.admin.sent-list');
    }
}
