<?php

namespace App\Http\Livewire\Guest;

use App\Models\Message;
use App\Models\MessageAttachment;
use Livewire\Component;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Actions\Action;
use Livewire\WithFileUploads;

// use Illuminate\Contracts\View\View;

class InboxList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    use WithFileUploads;

    public $compose_modal = false;
    public $view_modal = false;
    public $has_attachment = false;

    public $reply_modal = false;

    public $message_data;
    public $attachment_image;
    public $sort = "All";
    public $attachment, $label, $message, $subject, $complaint, $reply_messages;
    public function render()
    {
        return view('livewire.guest.inbox-list');
    }

    protected function getFormSchema(): array
    {
        return [
            Select::make('label')->label('Label Type')->reactive()
                ->options([
                    'Complaint' => 'Complaint',
                    'Concerns' => 'Concerns',
                    'Maintenance' => 'Maintenance',
                    'Amenity' => 'Amenity',
                    'Package' => 'Package',
                ]),
            Select::make('complaint')->label('Nature of Complaint')->visible(
                function () {
                    return $this->label == 'Complaint';
                }
            )
                ->options([
                    'Noise' => 'Noise',
                    'Trash' => 'Trash',
                    'Security' => 'Security',
                    'Boundaries' => 'Boundaries',
                    'Rule Violation' => 'Rule Violation',
                ]),
            TextInput::make('subject'),
            Textarea::make('message')

        ];
    }

    protected function getTableQuery(): Builder
    {

        if ($this->sort == 'All') {
            return Message::query()->where('receiver_id', auth()->user()->id)->orderBy('created_at', 'desc');
        } else {
            return Message::query()->where('receiver_id', auth()->user()->id)->where('read_at', null)->orderBy('created_at', 'desc');
        }

    }

    protected function getTableActions(): array
    {
        return [
            Action::make('view')->label('View Message')->icon('heroicon-o-eye')->color('warning')->action(
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
            )
        ];
    }
    public function replyMessage()
    {
        $this->validate([
            'reply_messages' => 'required'
        ]);

        $message = Message::create([
            'user_id' => auth()->user()->id,
            'receiver_id' => 1,
            'resident_name' => auth()->user()->name,
            'complainee_unit' => auth()->user()->user_information->unit_number,
            'label_type' => $this->message_data->label_type,
            'nature_of_complaint' => $this->message_data->nature_of_complaint,
            'subject' => $this->message_data->label_type ?? null,
            'message' => $this->reply_messages,
        ]);

        if ($this->attachment != null) {
            MessageAttachment::create([
                'message_id' => $message->id,
                'file_path' => $this->attachment->store('message_attachment', 'public'),
            ]);
        }

        $this->reply_modal = false;
        sweetalert()->addSuccess('Message Sent');
        $this->reset('reply_messages');
    }

    protected function getTableColumns(): array
    {
        return [
            Split::make([
                ViewColumn::make('status')->view('guest.filament.inbox'),
                ViewColumn::make('message')->view('guest.filament.message'),
                TextColumn::make('created_at')->date()->alignEnd(),
            ])
        ];
    }

    public function closeModal()
    {
        $this->view_modal = false;
        return redirect()->route('guest.inbox');
    }

    public function sendMessage()
    {
        // dd($this->attachment);
        $this->validate([
            'label' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        if ($this->attachment != null) {
            $message = Message::create([
                'user_id' => auth()->user()->id,
                'resident_name' => auth()->user()->name,
                'receiver_id' => 1,
                'complainee_unit' => auth()->user()->user_information->unit_number,
                'label_type' => $this->label,
                'nature_of_complaint' => $this->complaint == null ? null : $this->complaint,
                'subject' => $this->subject,
                'message' => $this->message,
            ]);

            MessageAttachment::create([
                'message_id' => $message->id,
                'file_path' => $this->attachment->store('message_attachment', 'public'),
            ]);

            $this->compose_modal = false;
            $this->reset('subject', 'message', 'label', 'complaint', 'attachment');
            sweetalert()->addSuccess('Message Sent');



        } else {
            Message::create([
                'user_id' => auth()->user()->id,
                'receiver_id' => 1,
                'resident_name' => auth()->user()->name,
                'complainee_unit' => auth()->user()->user_information->unit_number,
                'label_type' => $this->label,
                'nature_of_complaint' => $this->complaint == null ? null : $this->complaint,
                'subject' => $this->subject,
                'message' => $this->message,
            ]);

            $this->compose_modal = false;
            $this->reset('subject', 'message', 'label', 'complaint', 'attachment');
            sweetalert()->addSuccess('Message Sent');
        }
    }

    public function removeAttachment()
    {
        $this->reset('attachment');
    }
}
