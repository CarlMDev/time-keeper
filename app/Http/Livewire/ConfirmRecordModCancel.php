<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class ConfirmRecordModCancel extends ModalComponent
{
    public $recordModificationId;
    protected $listeners = ['closeModal' => 'render'];

    public function mount($recordModificationId)
    {
        $this->recordModificationId = $recordModificationId;
        
    }

    public function render()
    {
        return view('livewire.confirm-record-mod-cancel');
    }
}
