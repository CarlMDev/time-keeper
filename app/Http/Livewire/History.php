<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\TimeZone;
use App\Models\TimeRecord;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
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
        
        $this->selectedPeriod = "5";

    }

    public function updated()
    {
        $this->resetPage();
        $this->records = $this->queryFreshData($this->userId);
    }

    public function queryFreshData($userId)
    {
        $period = "";

        $this->userTz = Auth::user()->time_zone_code;
        $this->timeFormat = Auth::user()->hour_format_24;
        $this->dateFormat =Auth::user()->date_format;
        
        $now = Carbon::now()->setTimeZone($this->userTz);
        
        switch($this->selectedPeriod) 
        {
            case "5":
                $period = $now->addDays(-6);
                break;
            case "20":
                $period = $now->addDays(-21);
                break;
            case "30":
                $period = $now->addDays(-31);
                break;
            case "60":
                $period = $now->addDays(-61);
                break;
            case "90":
                $period = $now->addDays(-91);
                break;
        }

        $period = $period->setTimeZone('UTC');    
    
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
