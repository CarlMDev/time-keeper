<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TimeRecord;
use App\Models\TimeRecordModification;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class EditTimeRecord extends Component
{
    public $recordId;
    public $recordDate;
    public $recordTime;

    public $userTzCode;
    public $dateFormat;
    public $time24HrFormat;

    protected $record;

    public $requestedDateTime;
    public $message;

    public $userTzName;

    public function mount()
    {
        $this->userTzCode = Auth::user()->time_zone_code;
        $this->dateFormat =Auth::user()->date_format;
        $this->userTzName = Auth::user()->time_zone_name;
        $this->time24HrFormat = Auth::user()->hour_format_24;

        $this->record = TimeRecord::where('id', '=', $this->recordId)->first();
        $this->recordDate = $this->record->created_at;

    }

    public function submitRequest()
    {
 
        $success = false;
        $error = 'none';

        try
        {
            $this->requestedDateTime = str_replace('T', ' ', $this->requestedDateTime);
            $requestedDate =  Carbon::createFromFormat('Y-m-d H:i', $this->requestedDateTime, $this->userTzName);
            $requestedDate->setTimezone('+01:00'); //convert to utc time, needs +1:00 to work out correctly in db
        
            $timeRecordModification = new TimeRecordModification();

            $timeRecordModification->time_record_id = $this->recordId;
            $timeRecordModification->user_id = Auth::user()->id;
            $timeRecordModification->modification_type ='Edit';
            $timeRecordModification->existing_record_date_time = $this->recordDate; // already utc time zone
            $timeRecordModification->requested_record_date_time = $requestedDate;
            $timeRecordModification->request_processed = 0;
            $timeRecordModification->message = $this->message != '' ? $this->message : NULL;

            $timeRecordModification->save();

            $timeRecord = TimeRecord::find($this->recordId);
            $timeRecord->modification_requested = 1;
            $timeRecord->save();

            $success = true;

        }

        catch(Exception $ex)
        {
            $error = $ex->getMessage();
            $success = false;

        }

        $this->status = $error;

        if($success)
        {
            $this->redirect('/dashboard');
        }
        else{
            $this->redirect('/user/profile');
        }
    }
    
    

    public function render()
    {
        return view('livewire.edit-time-record');
    }
}
