<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Timerecord;
use Illuminate\Support\Facades\DB;
class CurrentDayTimeTable extends Component
{

    public $records;
    public $userTz;

    protected $listeners = ['clockButtonClicked' => 'mount'];

    public function mount()
    {
        $userId = Auth::user()->id;
        $this->userTz = Auth::user()->time_zone;
       // DB::connection()->enableQueryLog();
        
       $this->records = DB::select('SELECT * FROM time_records WHERE user_id = 1 AND created_at >= CONVERT_TZ(\'2023-08-03 00:00:00\',\'-08:00\',\'+00:00\');');
       //$this->records = TimeRecord::where('user_id', '=', $userId)
        //                    ->where('created_at', '>=', 'CONVERT_TZ(\'2023-08-03 00:00:00\',\'-08:00\',\'+00:00\') ')
        // ->where('created_at', '>', 'CONVERT_TZ(\''. date('Y-M-d') . '\',\'' . $this->userTz . '\',\'+00:00\')  + INTERVAL 1 DAY ') //converting from local time to utc time to query database
                      //  ->where('created_at', '<', 'CONVERT_TZ(CURRENT_DATE,\'+03:00\',\'+00:00\')  + INTERVAL 1 DAY')
        //                      ->get();

                            
                             // $queries = \DB::getQueryLog();
                          //    $last_query = end($queries);
                             // dd($queries);
        
    }

    public function render()
    {
        return view('livewire.current-day-time-table');
    }
}
