<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

class ConfirmRecordDelete extends ModalComponent
{
    public $recordId;

    public function mount($recordId)
    {
        $this->recordId = $recordId;
    }
    
    public function render()
    {
        return view('livewire.confirm-record-delete');
    }
}
