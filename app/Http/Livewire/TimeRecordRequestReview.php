<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TimeRecord;
use App\Models\User;
use App\Models\TimeRecordModification;

class TimeRecordRequestReview extends Component
{
    public $user;
    public $modification;
    public $timeRecord;

    public function mount($id)
    {
        $this->modification = TimeRecordModification::find($id);
        $this->user = User::find($this->modification->user_id);
        $this->timeRecord = TimeRecord::find($this->modification->time_record_id);
    }

    public function render()
    {
        return view('livewire.time-record-request-review');
    }
}
