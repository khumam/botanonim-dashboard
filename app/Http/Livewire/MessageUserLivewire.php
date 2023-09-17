<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Livewire\Component;

class MessageUserLivewire extends Component
{
    public $chatId;
    public $messages = [];

    public function mount()
    {
        $this->messages = Message::where('chat_id', $this->chatId)->orderBy('date', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.message-user-livewire');
    }
}
