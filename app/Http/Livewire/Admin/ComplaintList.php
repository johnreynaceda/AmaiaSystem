<?php

namespace App\Http\Livewire\Admin;

use App\Models\Maintenance;
use Livewire\Component;
use App\Models\Complaint;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ViewColumn;

class ComplaintList extends Component implements Tables\Contracts\HasTable
{

    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return Complaint::query();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('description')->label('DESCRIPTION')->searchable(),
            TextColumn::make('user.user_information.unit_number')->label('COMPLAINEE UNIT')->searchable(),
            TextColumn::make('type')->label('NATURE OF COMPLAINT')->searchable()->weight('bold')->formatStateUsing(
                function ($record) {
                    return strtoupper($record->type);
                }
            ),
            TextColumn::make('complaint_date')->label('DATE OF COMPLAINT')->date()->searchable(),
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
            TextColumn::make('completed_date')->label('DATE COMPLETED')->date()->searchable(),
            ViewColumn::make('notify')->label('NOTIFY')->view('admin.filament.complaint-notify')
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
                                'completed_date' => now(),
                            ]);
                            sweetalert()->addSuccess('Request completed');
                        }
                    ),

            ]),

        ];
    }
    public function render()
    {
        return view('livewire.admin.complaint-list');
    }
}
