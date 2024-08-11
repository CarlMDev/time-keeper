<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TimeRecordModification;
use App\Models\TimeRecord;

class TimeRecordModRequestCancel extends Component
{

    public $recordModification;
    public $timeRecord;

    public function mount($id)
    {
        $this->recordModification = TimeRecordModification::where('id', '=', $id)->first();
        $this->timeRecord = TimeRecord::where('id', '=', $this->recordModification->time_record_id)->first();
        $this->timeRecord->modification_requested = 0;
        $this->timeRecord->save();
        $this->recordModification->delete();
    }

    public function render()
    {
        return view('livewire.time-record-mod-request-cancel');
    }
}
