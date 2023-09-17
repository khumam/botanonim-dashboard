<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Carbon\Carbon;
use Livewire\Component;

class MessageUserLivewire extends Component
{
    public $chatId;
    public $messages = [];
    public $date = '';

    public function mount()
    {
        $this->date = Carbon::parse(Carbon::now())->format('Y-m-d');
        $this->filter();
    }

    public function filter()
    {
        $this->messages = Message::where('chat_id', $this->chatId)->whereDate('date', $this->date)->orderBy('date', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.message-user-livewire');
    }
}
