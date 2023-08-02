<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Timerecord;

class CurrentDayTimeTable extends Component
{

    public $records;

    protected $listeners = ['clockButtonClicked' => 'mount'];

    public function mount()
    {
        $userId = Auth::user()->id;

        $this->records = TimeRecord::where('user_id', '=', $userId)
                        ->where('created_at', '>', 'CONVERT_TZ(\''. date('Y-M-d') . '\',\'+03:00\',\'+00:00\')  + INTERVAL 1 DAY ') //converting from local time to utc time to query database
                      //  ->where('created_at', '<', 'CONVERT_TZ(CURRENT_DATE,\'+03:00\',\'+00:00\')  + INTERVAL 1 DAY')
                        ->get();
    }

    public function render()
    {
        return view('livewire.current-day-time-table');
    }
}
