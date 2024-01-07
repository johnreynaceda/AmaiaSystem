<?php

namespace App\Http\Livewire\Admin;

use App\Mail\ReceiptMail;
use App\Models\Amenity;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use App\Models\Maintenance;
use App\Models\AmenityRequest;
use App\Models\UserInformation;
use Filament\Forms;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Grid;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Columns\ViewColumn;

class AmenityRequestList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    public $unitNumber;

    public $view_visitor = false;

    public function mount($unitNumber)
    {
        $this->unitNumber = $unitNumber;
    }

    protected function getTableQuery(): Builder
    {

        return AmenityRequest::query()->orderByDesc('status');

    }

    protected function getTableFilters(): array
    {
        return [
            SelectFilter::make('status')->label('STATUS')
                ->options([
                    'pending' => 'Pending',
                    'approved' => 'Approved',
                    'completed' => 'Completed',
                ])
        ];
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('amenity.name')->label('TYPE')->searchable()->sortable(),
            TextColumn::make('user.user_information.unit_number')->label('UNIT')->searchable()->formatStateUsing(
                function ($record) {
                    return 'Room ' . ($record->user->user_information->unit_number);
                }
            )->sortable(),
            TextColumn::make('request_date')->label('REQUESTED DATE')->date()->sortable(),
            TextColumn::make('preffered_time')->label('PREFFERED TIME')->formatStateUsing(
                function ($record) {
                    return \Carbon\Carbon::parse($record->request_date)->format('H:i A');
                }
            )->sortable(),
            BadgeColumn::make('status')->label('STATUS')
                ->enum([
                    'pending' => 'Pending',
                    'approved' => 'Approved',
                    'completed' => 'Completed',
                ])->colors([
                        'warning' => 'pending',
                        'success' => 'approved',
                        'primary' => 'completed'
                    ])->sortable(),
            TextColumn::make('amount')->label('AMOUNT')->formatStateUsing(
                function ($record) {
                    return '₱' . number_format($record->amount, 2);
                }
            )->sortable(),
            TextColumn::make('date_completed')->label('COMPLETED DATE')->date()->sortable(),
            // TextColumn::make('visitor')->label('REGISTERED VISITOR')->formatStateUsing(
            //     function ($record) {
            //         return explode(',', $record->visitors);
            //     }
            // )->searchable()->sortable(),
            ViewColumn::make('visitor')->label('VISITORS')->view('admin.filament.visitors'),

        ];

    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\ActionGroup::make([
                Action::make('approve')->label('Approved')->icon('heroicon-o-thumb-up')->action(
                    function ($record) {
                        $record->update([
                            'status' => 'approved',
                        ]);

                        $message = Message::create([
                            'user_id' => auth()->user()->id,
                            'resident_name' => $record->user->name,
                            'receiver_id' => $record->user_id,
                            'complainee_unit' => $record->user->user_information->unit_number,
                            'label_type' => 'Amenity',
                            // 'nature_of_complaint' => $this->complaint,
                            'subject' => 'null',
                            'message' => 'Your Amenity (' . Amenity::Where('id', $record->amenity_id)->first()->name . ') request for UNIT ' . $record->user->user_information->unit_number . ' is approved by Admin. To proceed, please settle the request on the lobby.',
                        ]);
                        sweetalert()->addSuccess('Request approved');
                    }
                )->visible(
                        function ($record) {
                            return $record->status == 'pending';
                        }
                    ),
                Action::make('put_amount')->label('Insert Amount')->icon('heroicon-o-cash')->color('success')->visible(
                    function ($record) {
                        return $record->status == 'approved';
                    }
                )->action(
                        function ($record, $data) {
                            $record->update([
                                'amount' => $data['request_amount'],
                            ]);
                            sweetalert()->addSuccess('Amount Added');
                        }
                    )->form([
                            TextInput::make('request_amount')->numeric()
                        ])->modalHeading('Insert Amount')->modalWidth('lg'),
                Action::make('declined')->label('Declined')->icon('heroicon-o-thumb-down')->color('danger')->action(
                    function ($record) {
                        $record->update([
                            'status' => 'declined',
                        ]);

                        $message = Message::create([
                            'user_id' => auth()->user()->id,
                            'resident_name' => $record->user->name,
                            'receiver_id' => $record->user_id,
                            'complainee_unit' => $record->user->user_information->unit_number,
                            'label_type' => 'Amenity',
                            // 'nature_of_complaint' => $this->complaint,
                            'subject' => 'null',
                            'message' => 'Your Amenity (' . Amenity::Where('id', $record->amenity_id)->first()->name . ') request for UNIT ' . $record->user->user_information->unit_number . ' is declined by Admin. For more information, please contact Administrator',
                        ]);
                        sweetalert()->addSuccess('Request approved');
                    }
                )->visible(
                        function ($record) {
                            return $record->status == 'pending';
                        }
                    ),

                Action::make('complete')->label('Completed')->icon('heroicon-o-check-circle')->visible(
                    function ($record) {
                        return $record->status == 'approved';
                    }

                )->action(
                        function ($record) {
                            $record->update([
                                'status' => 'completed',
                                'date_completed' => now(),
                            ]);

                            Mail::to($record->user->email)->send(new ReceiptMail($record->transaction_number, Carbon::parse($record->date_completed)->format('F d, Y h:i A'), '₱' . number_format($record->amount, 2)));
                            sweetalert()->addSuccess('Request completed');
                        }
                    ),
            ]),

        ];
    }

    public function render()
    {
        return view('livewire.admin.amenity-request-list');
    }
}
