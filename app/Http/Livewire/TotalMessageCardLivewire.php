<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Livewire\Component;

class TotalMessageCardLivewire extends Component
{
    public $count = 0;

    public function mount()
    {
        $this->update();
    }
    public function update()
    {
        $this->count = Message::count();
    }
    public function render()
    {
        return view('livewire.total-message-card-livewire');
    }
}
