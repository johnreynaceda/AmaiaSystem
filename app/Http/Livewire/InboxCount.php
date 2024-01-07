<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Livewire\Component;

class InboxCount extends Component
{

    protected $listeners = ['viewMessage' => 'render'];
    public function render()
    {
        return view('livewire.inbox-count', [
            'counts' => Message::where('receiver_id', auth()->user()->id)->whereNull('read_at')->count(),
        ]);
    }
}
