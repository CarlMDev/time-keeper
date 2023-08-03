<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CurrentTime extends Component
{
    public $userTimeZone;
    
    public function mount()
    {
        $user = Auth::user();
        $this->userTimeZone = $user->time_zone;
    }

    public function render()
    {
        return view('livewire.current-time');
    }
}