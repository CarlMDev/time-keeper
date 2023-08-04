<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Timerecord;
use App\Models\TimeZone;
use Illuminate\Support\Facades\DB;

class CurrentDayTimeTable extends Component
{

    public $records;
    public $userTz;
    public $tz;
    public $timeFormat;

    protected $listeners = ['clockButtonClicked' => 'mount'];

    public function mount()
    {
        $userId = Auth::user()->id;

        $this->userTz = Auth::user()->time_zone;
        $this->timeFormat = Auth::user()->hour_format_24;

        $this->tz = TimeZone::where('name', '=', $this->userTz)->first();
        
        $this->records = DB::select('SELECT * FROM time_records WHERE user_id = 1 AND created_at >= CONVERT_TZ(\''. date('Y-m-d') .  ' 00:00:00\',\'' . $this->tz->code . '\',\'+00:00\');');        
    }

    public function render()
    {
        return view('livewire.current-day-time-table');
    }
}
