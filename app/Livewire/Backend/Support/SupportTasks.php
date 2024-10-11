<?php

namespace App\Livewire\Backend\Support;

use Livewire\Component;
use App\Models\Task;
use App\Models\TaskAssigne;
use Livewire\WithPagination;

class SupportTasks extends Component
{
    use WithPagination;

    public $search;
    public $size = 10;
    public $ticketId;
    public $tickets;

    public function mount($ticketId)
    {
        $this->ticketId = $ticketId;
    }

    public function render()
    {
        $tasks = Task::where('name', 'like', "%{$this->search}%")
            ->where('rel_id', $this->ticketId)
            ->where('rel_type', 'ticket')
            ->with('tagables')
            ->latest()
            ->paginate($this->size);

        return view('livewire.backend.support.support-tasks', [
            'tasks' => $tasks,
            'ticketId' => $this->ticketId,
        ]);
    }
}
