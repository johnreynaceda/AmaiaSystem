<?php

namespace App\Http\Livewire\Admin;

use App\Models\Message;
use App\Models\MessageAttachment;
use App\Models\UserInformation;
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
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Livewire\WithFileUploads;
use Filament\Tables\Columns\SelectColumn;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;

class MessageList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    use WithFileUploads;
    public $compose = false;
    public $lot_number, $label, $complaint, $subject, $message;
    public $details;
    public $attachment;
    public $label_type = 'Complaint';
    public $sidebar = 'All Inbox';
    public $attachment_image;
    public $view_modal = false;
    public $has_attachment = false;

    public $message_data;

    protected function getTableQuery(): Builder
    {
        return Message::query()->where('receiver_id', auth()->user()->id)->where('status', '!=', 'deleted')->orderBy('created_at', 'DESC');
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('resident_name')->label('RESIDENT NAME')->searchable(),
            TextColumn::make('complainee_unit')->label('UNIT')->searchable(),
            TextColumn::make('nature_of_complaint')->label('NATURE COMPLAINT')->searchable(),
            TextColumn::make('created_at')->date()->label('DATE OF COMPLAINT')->searchable(),
            TextColumn::make('message')->label('MESSAGE')->searchable()->words(3),
            BadgeColumn::make('status')->label('STATUS')
                ->enum([
                    'active' => 'Active',
                    'completed' => 'Completed',
                ])->colors([
                        'success' => 'active',
                        'primary' => 'completed'
                    ])->sortable(),
            TextColumn::make('date_completed')->date()->label('DATE COMPLETED')->searchable(),


        ];

    }

    protected function getFormSchema(): array
    {
        return [
            Select::make('lot_number')->label('Unit Number')->searchable()->reactive()
                ->options(
                    array_combine(
                        range(1, 912),
                        // Generate an array of numbers from 1 to 200
                        array_map(function ($number) {
                            return 'Room ' . $number;
                        }, range(1, 912)) // Concatenate "room" to each number
                    )
                ),
            Select::make('label')->label('Label Type')
                ->options([
                    'Complaint' => 'Complaint',
                    'Concerns' => 'Concerns',
                    'Maintenance' => 'Maintenance',
                    'Amenity' => 'Amenity',
                    'Package' => 'Package',
                ]),
            Select::make('complaint')->label('Nature of Complaint')
                ->options([
                    'Noise' => 'Noise',
                    'Trash' => 'Trash',
                    'Security' => 'Security',
                    'Boundaries' => 'Boundaries',
                    'Rule Violation' => 'Rule Violation',
                ]),
            TextInput::make('subject'),

        ];
    }

    public function sendMessage()
    {

        $this->validate([
            'lot_number' => 'required',
            'label' => 'required',
            'complaint' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        if ($this->attachment != null) {
            $message = Message::create([
                'user_id' => auth()->user()->id,
                'resident_name' => $this->details->user->name,
                'receiver_id' => $this->details->user->id,
                'complainee_unit' => $this->details->unit_number,
                'label_type' => $this->label,
                'nature_of_complaint' => $this->complaint,
                'subject' => $this->subject,
                'message' => $this->message,
            ]);

            MessageAttachment::create([
                'message_id' => $message->id,
                'file_path' => $this->attachment->store('message_attachment', 'public'),
            ]);

            $this->compose = false;
            sweetalert()->addSuccess('Message Sent');
        } else {
            Message::create([
                'user_id' => auth()->user()->id,
                'resident_name' => $this->details->user->name,
                'receiver_id' => $this->details->user->id,
                'complainee_unit' => $this->details->unit_number,
                'label_type' => $this->label,
                'nature_of_complaint' => $this->complaint,
                'subject' => $this->subject,
                'message' => $this->message,
            ]);

            $this->compose = false;
            sweetalert()->addSuccess('Message Sent');

        }
        $this->sidebar = 'All Inbox';
    }

    public function sidebarLink($link)
    {
        $this->compose = '';
        $this->sidebar = $link;
    }

    public function compose()
    {
        $this->sidebar = '';
        $this->compose = true;
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

                Tables\Actions\Action::make('complete')->label('Completed')->icon('heroicon-o-check')->visible(
                    function ($record) {
                        return $record->date_completed == null;
                    }
                )->action(
                        function ($record) {
                            $record->update([
                                'date_completed' => now(),
                                'status' => 'completed',
                            ]);
                            sweetalert()->addSuccess('Message Completed');
                        }
                    ),
                Tables\Actions\Action::make('contact_tenant')->label('Contact Tenant')->icon('heroicon-o-phone-incoming')->action(
                    function ($record, $data) {
                        Message::create([
                            'user_id' => auth()->user()->id,
                            'resident_name' => $record->resident_name,
                            'receiver_id' => $record->user_id,
                            'complainee_unit' => $record->complainee_unit,
                            'label_type' => $record->label_type,
                            'nature_of_complaint' => $record->nature_of_complaint,
                            'subject' => $data['subject'],
                            'message' => $data['message'],
                        ]);

                        sweetalert()->addSuccess('Message Send');
                    }
                )->form(function ($record) {
                    return [
                        TextInput::make('label_type')->label('Label Type')->placeholder($record->label_type)->disabled(),
                        TextInput::make('nature')->label('Nature of Complaint')->placeholder($record->nature_of_complaint)->disabled(),
                        TextInput::make('subject')->label('Subject'),
                        Textarea::make('message')->label('Message')
                    ];
                })->modalWidth('2xl'),
                // Tables\Actions\Action::make('contact_dept')->label('Contact Dept')->icon('heroicon-o-phone-incoming'),
                Tables\Actions\DeleteAction::make('delete')->label('Delete')->icon('heroicon-o-trash')->action(
                    function ($record) {
                        $record->update([
                            'status' => 'deleted',
                        ]);
                        sweetalert()->addSuccess('Message Deleted');
                    }
                ),
            ]),
        ];
    }

    protected function getTableFilters(): array
    {
        return [
            SelectFilter::make('label_type')->label('Label Type')
                ->options([
                    'Complaint' => 'Complaint',
                    'Concerns' => 'Concerns',
                    'Maintenance' => 'Maintenance',
                    'Amenity' => 'Amenity',
                    'Package' => 'Package',
                ])
                ->attribute('label_type'),
            SelectFilter::make('nature_of_complaint')->label('Nature of Complaint')
                ->options([
                    'Noise' => 'Noise',
                    'Trash' => 'Trash',
                    'Security' => 'Security',
                    'Boundaries' => 'Boundaries',
                    'Rule Violation' => 'Rule Violation',
                ])
                ->attribute('nature_of_complaint')
        ];
    }

    public function render()
    {
        return view('livewire.admin.message-list');
    }

    public function updatedAttachment()
    {

    }

    public function updatedLotNumber()
    {
        $data = UserInformation::where('unit_number', $this->lot_number)->whereHas('user', function ($record) {
            $record->where('is_accepted', 1)->where('status', null);
        })->first();
        if ($data) {
            $this->details = $data;
        } else {
            sweetalert()->addError('No Tenant Found.');
            $this->reset('lot_number', 'details');
        }
    }
}
