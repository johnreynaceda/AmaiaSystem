<?php

namespace App\Http\Livewire;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Livewire\Component;
use Filament\Forms;
use Illuminate\Contracts\View\View;

class Setting extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;
    public $setting_modal;

    public $logo_path;
    public $favicon_path;
    public $background_path;

    public $project_name, $favicon = [], $logo = [], $background = [];



    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('project_name')->placeholder(\App\Models\Setting::count() > 0 ? \App\Models\Setting::first()->project_name : '')->required(),
            Grid::make(2)->schema([
            FileUpload::make('logo')->required(),
            FileUpload::make('favicon')->required(),
            FileUpload::make('background')->required(),
            ])

        ];
    }

    public function save(){
        $this->validate([
            'project_name' => 'required',
            'logo' => 'required',
            'favicon' =>'required',
            'background' =>'required',
        ]);


        foreach ($this->logo as $key => $value )  {
            $this->logo_path = $value->store('Setting', 'public');
        }

        foreach ($this->favicon as $key => $value )  {
            $this->favicon_path = $value->store('Setting', 'public');
        }

        foreach ($this->background as $key => $value )  {
            $this->background_path = $value->store('Setting', 'public');
        }

        if (\App\Models\Setting::count() > 0) {
            \App\Models\Setting::first()->update([
                'project_name' => $this->project_name,
                'logo_path' => $this->logo_path,
                'favicon_path' => $this->favicon_path,
                'background_path' => $this->background_path,
            ]);
        }else{
            \App\Models\Setting::create([
                'project_name' => $this->project_name,
                'logo_path' => $this->logo_path,
                'favicon_path'=> $this->favicon_path,
                'background_path' => $this->background_path,
            ]);
        }

        sleep(3);
        if (\App\Models\Setting::count() > 0) {
            return redirect()->route('admin.settings');
        }else{
            return redirect()->route('login');
        }
    }

    public function render()
    {
        if (\App\Models\Setting::count() > 0) {
            $this->setting_modal = false;
         }else{
             $this->setting_modal = true;
         }
        return view('livewire.setting');
    }
}
