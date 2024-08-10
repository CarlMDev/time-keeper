<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TimeRecord;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TimeRecordModify extends Component
{
    public $recordId;
    public $userTz;
    public $dateFormat;
    public $timeFormat;
    public $employee;
    protected $record;


    public function mount()
    {
        $this->userTz = Auth::user()->time_zone_code;
        $this->dateFormat =Auth::user()->date_format;
        $this->timeFormat = Auth::user()->hour_format_24;
    }

    public function render()
    {
        $this->record = TimeRecord::where('id', '=', $this->recordId)->first();
        $this->employee = User::where('id', '=', $this->record->user_id)->first();

        return view('livewire.time-record-modify', ['employee' => $this->employee, 'record' => $this->record]);
    }
}