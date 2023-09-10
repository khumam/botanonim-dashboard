<?php

namespace App\Http\Livewire;

use App\Models\ActiveChat;
use Livewire\Component;

class TotalActiveChatCardLivewire extends Component
{
    public $count = 0;

    public function mount()
    {
        $this->update();
    }
    public function update ()
    {
        $this->count = ActiveChat::count();
    }
    public function render()
    {
        return view('livewire.total-active-chat-card-livewire');
    }
}
