<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\TimeRecord;

class PunchInOut extends Component
{
    public $buttonMessage;
    public $buttonStyle;
    public $status;
    public $statusStyle;

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
            $this->buttonStyle = "bg-blue-500 hover:bg-red-500 text-white font-bold py-2 px-4 rounded";
           
            $this->buttonMessage = "CLOCK IN";
            $this->status = "You are currently clocked OUT";
            $this->statusStyle = "text-xl break-after-auto pb-8 pt-2 text-red-600";
        }
        else
        {
            $this->buttonStyle = "bg-blue-500 hover:bg-red-500 text-white font-bold py-2 px-4 rounded";
            $this->buttonMessage = "CLOCK OUT";
            $this->status = "You are currently clocked IN";
            $this->statusStyle = "text-xl break-after-auto pb-8 pt-2 text-green-700";
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