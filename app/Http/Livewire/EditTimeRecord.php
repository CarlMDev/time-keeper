<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TimeRecord;
use Illuminate\Support\Facades\Auth;

class EditTimeRecord extends Component
{
    public $recordId;
    public $recordDate;
    public $recordTime;

    public $userTz;
    public $dateFormat;
    public $time24HrFormat;

    protected $record;

    public function mount()
    {
        $this->userTz = Auth::user()->time_zone;
        $this->dateFormat =Auth::user()->date_format;
        $this->time24HrFormat = Auth::user()->hour_format_24;

        $this->record = TimeRecord::where('id', '=', $this->recordId)->first();
        $this->recordDate = date_format($this->record->created_at, $this->dateFormat);

        if ($this->time24HrFormat == true)
        {
            $this->recordTime = date_format($this->record->created_at, 'H:i');
        }
        else
        {
            $this->recordTime = date_format($this->record->created_at, 'h:i');
        }
        
    }

    public function render()
    {
        return view('livewire.edit-time-record');
    }
}
