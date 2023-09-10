<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use Livewire\Component;

class TotalChatCardLivewire extends Component
{
    public $count = 0;

    public function mount()
    {
        $this->update();
    }
    public function update()
    {
        $this->count = Chat::count();
    }
    public function render()
    {
        return view('livewire.total-chat-card-livewire');
    }
}
