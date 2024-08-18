<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\TimeRecordModification;

class TimeRecordRequestList extends Component
{
    public $recordList;

    public function mount()
    {
        $this->recordList = TimeRecordModification::where('time_record_modifications.request_processed', '=', 0)
        ->join('users', 'users.id', '=', 'time_record_modifications.user_id')
        ->join('time_records', 'time_records.id', '=', 'time_record_modifications.time_record_id')
        ->select('users.name AS name', 'time_record_modifications.modification_type AS modification_type', 'time_record_modifications.id AS id', 'time_records.created_at AS created_at', 'time_records.in_out AS in_out', 'users.time_zone_code as tz_code')
        ->get();
        
    }

    public function render()
    {
        return view('livewire.time-record-request-list');
    }
}
