<?php

namespace App\Livewire\Backend\Task;

use App\Models\Task;
use Livewire\Component;
use App\Models\TaskAssigne;
use Livewire\WithPagination;

class Tasks extends Component
{
    use WithPagination;
    public $search, $id, $size = 10;
    
    public function render()
    {
        $data['tasks'] = Task::where('name', 'like', "%{$this->search}%")->with('tagables')->latest()->paginate($this->size);
        return view('livewire.backend.task.tasks', $data);
    }
}
