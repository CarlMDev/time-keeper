<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\TimeZone;
use App\Models\TimeRecord;
use Carbon\Carbon;
use Livewire\WithPagination;

class History extends Component
{
    use WithPagination;

    public $selectedPeriod;
    public $userId;
    protected $records;
    public $userTz;

    public function mount()
    {
        $this->userId = Auth::user()->id;
        
        $this->selectedPeriod = "1";

    }

    public function updated()
    {
        $this->resetPage();
        $this->records = $this->queryFreshData($this->userId);
    }

    public function queryFreshData($userId)
    {
        $period = "";

        $this->userTz = Auth::user()->time_zone;
        $this->timeFormat = Auth::user()->hour_format_24;
        $this->dateFormat =Auth::user()->date_format;
        
        $currentDay = Carbon::now();
        
        switch($this->selectedPeriod) 
        {
            case "1":
                $period = Carbon::yesterday();
                break;
            case "5":
                $period = $currentDay->addDays(-5);
                break;
            case "20":
                $period = $currentDay->addDays(-20);
                break;
            case "30":
                $period = $currentDay->addDays(-30);
                break;
            case "60":
                $period = $currentDay->addDays(-60);
                break;
            case "90":
                $period = $currentDay->addDays(-90);
                break;
        }
    
        $records = TimeRecord::where('user_id', '=', $userId)
                            ->where('created_at', '>=', $period)
                            ->orderBy('created_at')
                            ->paginate(20);
       return $records;
    }

    public function render()
    {
        $this->records = $this->queryFreshData($this->userId);
       // dd($this->records);
        return view('livewire.history', ['records' => $this->records]);
    }
}
