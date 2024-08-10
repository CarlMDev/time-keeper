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
        $this->userTz = Auth::user()->time_zone_code;
        $this->dateFormat =Auth::user()->date_format;
        $this->time24HrFormat = Auth::user()->hour_format_24;

        $this->record = TimeRecord::where('id', '=', $this->recordId)->first();
        $this->recordDate = $this->record->created_at;

    }

    public function render()
    {
        return view('livewire.edit-time-record');
    }
}
