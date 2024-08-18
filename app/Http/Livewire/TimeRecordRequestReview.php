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


    public function processRequest()
    {
        if($this->modification->modification_type == 'Edit')
        {
            $this->timeRecord->created_at = $this->modification->requested_record_date_time;
            $this->timeRecord->modification_completed = 1;
            $this->timeRecord->save();

            $this->modification->request_processed = 1;
            $this->modification->save();
        }

        else
        {
            $this->timeRecord->delete();

            $this->modification->request_processed = 1;
            $this->modification->save();
        }

        return redirect()->route('time-record-requests');
    }

    public function render()
    {
        return view('livewire.time-record-request-review');
    }
}
