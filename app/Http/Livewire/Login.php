<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Livewire\Component;

class Login extends Component
{
    public function render()
    {
        return view('livewire.login',[
            'data' => Setting::get(),
        ]);
    }
}
