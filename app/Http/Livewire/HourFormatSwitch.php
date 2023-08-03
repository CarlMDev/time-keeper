<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HourFormatSwitch extends Component
{
    public $switch;

    public function mount()
    {
        $user = Auth::user();
        $this->switch = $user->hour_format_24;
    }

    public function setHourFormat()
    {
        $userId = Auth::user()->id;

        $user = User::findorfail($userId);
        $user->hour_format_24 =  $this->switch;
        $user->save();

    }

    public function render()
    {
        return view('livewire.hour-format-switch');
    }
}
