<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\TimeZone;
use Illuminate\Support\Facades\DB;

class CurrentDayTimeTable extends Component
{
    public $previousDayRecords;
    public $records;
    public $userTz;
    public $tz;
    public $timeFormat;
    public $dateFormat;

    protected $listeners = ['clockButtonClicked' => 'mount'];

    public function mount()
    {
        $userId = Auth::user()->id;

        $this->userTz = Auth::user()->time_zone;
        $this->timeFormat = Auth::user()->hour_format_24;
        $this->dateFormat =Auth::user()->date_format;
      
        $this->tz = TimeZone::where('name', '=', $this->userTz)->first();
        
        $this->records = DB::select('SELECT * FROM time_records WHERE user_id = ' . $userId . ' AND created_at >= \''. date('Y-m-d',strtotime('monday this week')) .  '\' ORDER BY created_at;');
        //$this->records = DB::select('SELECT * FROM time_records WHERE user_id = ' . $userId . ' AND created_at >= CONVERT_TZ(\''. date('Y-m-d',strtotime('last Monday')) .  ' 00:00:00\',\'' . $this->tz->code . '\',\'+00:00\') ORDER BY created_at;');
        //dd($this->records);
        
        $this->previousDayRecords = DB::select('SELECT * FROM time_records WHERE user_id = ' . $userId . ' AND created_at >= CONVERT_TZ(\''. date('Y/m/d',strtotime("-1 days")) .  ' 00:00:00\',\'' . $this->tz->code . '\',\'+00:00\') ORDER BY created_at DESC;');        
    }

    public function render()
    {
        return view('livewire.current-day-time-table');
    }
}
