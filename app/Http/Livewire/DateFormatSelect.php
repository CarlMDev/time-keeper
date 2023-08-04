<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DateFormatSelect extends Component
{

    public $selectedFormat;
    
    public function setDateFormat()
    {

    }
    public function render()
    {
        return view('livewire.date-format-select');
    }
}
