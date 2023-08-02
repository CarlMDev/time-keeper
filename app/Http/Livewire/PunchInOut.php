<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Timerecord;

class PunchInOut extends Component
{
    public $buttonMessage;
    public $buttonStyle;
    public $status;

    public function mount()
    {
        $user = Auth::user();
        
        $this->updateVariables($user->clocked_in_out);

    }

    public function updateVariables($value)
    {
        if($value == 0)
        {
            $this->buttonStyle = "bg-blue-500 hover:bg-red-300 hover:text-black text-white font-bold py-2 px-4 rounded";
            $this->buttonMessage = "CLOCK IN";
            $this->status = "You are currently clocked OUT";
        }
        else
        {
            $this->buttonStyle = "bg-red-700 hover:bg-blue-200 hover:text-black text-white font-bold py-2 px-4 rounded";
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
    }

    public function render()
    {
        return view('livewire.punch-in-out');
    }
}