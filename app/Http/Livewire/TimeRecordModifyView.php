<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TimeRecord;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\TimeRecordModification;

class TimeRecordModifyView extends Component
{
    public $recordId;
    public $userTz;
    public $dateFormat;
    public $timeFormat;
    public $employee;

    public $record;
    public $recordModification;


    public function mount()
    {
        $this->userTzCode = Auth::user()->time_zone_code;
        $this->dateFormat =Auth::user()->date_format;
        $this->timeFormat = Auth::user()->hour_format_24;

        $this->record = TimeRecord::where('id', '=', $this->recordId)->first();
        $this->employee = User::where('id', '=', $this->record->user_id)->first();

        $this->recordModification = TimeRecordModification::where('time_record_id', '=', $this->recordId)->first();

    }

    public function render()
    {
        return view('livewire.time-record-modify-view', ['employee' => $this->employee, 'record' => $this->record]);
    }
}
