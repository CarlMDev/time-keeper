<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\TimeRecord;
use App\Models\TimeRecordModification;

class RecordDeleteRequestSent extends Component
{

    public function mount($id)
    {
        $timeRecordModification = new TimeRecordModification();

        $timeRecordModification->time_record_id = $id;
        $timeRecordModification->user_id = Auth::user()->id;
        $timeRecordModification->modification_type ='Delete';
        $timeRecordModification->existing_record_date_time = NULL; // already utc time zone
        $timeRecordModification->requested_record_date_time = NULL;
        $timeRecordModification->request_processed = 0;
        $timeRecordModification->message = NULL;

        $timeRecordModification->save();

        $timeRecord = TimeRecord::find($id);
        $timeRecord->modification_requested = 1;
        $timeRecord->save();
    }
    public function render()
    {
        return view('livewire.record-delete-request-sent');
    }
}
