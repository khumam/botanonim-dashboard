<?php

namespace App\Http\Livewire;

use App\Models\UserBot;
use Livewire\Component;

class TotalUserVerifedCardLivewire extends Component
{
    public $count = 0;

    public function mount()
    {
        $this->count = UserBot::where('verifed_at', '!=', null)->count();
    }
    public function render()
    {
        return view('livewire.total-user-verifed-card-livewire');
    }
}
