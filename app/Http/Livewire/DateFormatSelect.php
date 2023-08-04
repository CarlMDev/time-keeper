<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class DateFormatSelect extends Component
{

    public $selectedDateFormat;

    public function mount()
    {
        $this->selectedDateFormat = Auth::user()->date_format;
    }

    public function setDateFormat()
    {
        $userId = Auth::user()->id;

        $user = User::find($userId);

        $user->date_format = $this->selectedDateFormat;
        $user->save();

        $this->emitUp('saved');
    }
    public function render()
    {
        return view('livewire.date-format-select');
    }
}
