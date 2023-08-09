<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\TimeRecord;

class PunchInOut extends Component
{
    public $buttonMessage;
    public $status;

    public function mount()
    {
        $user = Auth::user();
        
        $this->updateVariables($user->clocked_in_out);

    }

    public function updated()
    {
        $user = Auth::user();
        
        $this->updateVariables($user->clocked_in_out);
    }

    public function updateVariables($value)
    {
        if($value == 0)
        {      
            $this->buttonMessage = "CLOCK IN";
            $this->status = "You are currently clocked OUT";
        }
        else
        {
            $this->buttonMessage = "CLOCK OUT";
            $this->status = "You are currently clocked IN";
        }
    }

    public function toggle()
    {
        $userId = Auth::user()->id;

        $user = User::findorfail($userId);

        if($user->clocked_in_out == 0)
        {
            $user->clocked_in_out = 1;
            $user->save();
        }
        else
        {
            $user->clocked_in_out = 0;
            $user->save();
        }

        $timeRecord = new TimeRecord();

        $timeRecord->user_id = $userId;
        $timeRecord->in_out =  $user->clocked_in_out;
        $timeRecord->created_at = gmdate("Y/m/d H:i:s");
        $timeRecord->save();
        
        $this->updateVariables($user->clocked_in_out);

        $this->emit('clockButtonClicked');
    }

    public function render()
    {
        return view('livewire.punch-in-out');
    }
}