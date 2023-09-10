<?php

namespace App\Http\Livewire;

use App\Models\UserBot;
use Livewire\Component;

class TotalUserCardLivewire extends Component
{
    public $count = 0;

    public function mount()
    {
        $this->update();
    }
    public function update()
    {
        $this->count = UserBot::count();
    }
    public function render()
    {
        return view('livewire.total-user-card-livewire');
    }
}
