<?php

namespace App\Livewire\Backend\Setups\Supports;

use App\Models\Tickets_predefined_replies;
use Livewire\Component;
use Livewire\WithPagination;

class PredefiedReplies extends Component
{
    use WithPagination;

    public $search;
    public $name;
    public $message;
    public $size = 10;

    public function render()
    {
        $predefinedReplies = Tickets_predefined_replies::where('name', 'like', "%{$this->search}%")->latest()->paginate($this->size);
        return view('livewire.backend.setups.supports.predefied-replies')->with([
            'predefinedReplies' => $predefinedReplies,
        ]);
    }


    public function closeModal()
    {
        $this->resetInput();
    }


    private function resetInput()
    {
        $this->reset('name', 'message');
    }
}
