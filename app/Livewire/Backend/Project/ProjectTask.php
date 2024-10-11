<?php

namespace App\Livewire\Backend\Project;

use App\Models\Task;
use Livewire\Component;
use Livewire\WithPagination;

class ProjectTask extends Component
{
    use WithPagination;
    public $search, $id, $size = 10;
    public $mainproject_id;
    public function render()
    {
        $data['tasks'] = Task::where('rel_id', $this->mainproject_id)->where('rel_type', 'project')->where('name', 'like', "%{$this->search}%")->with('tagables')->latest()->paginate($this->size);
        return view('livewire.backend.project.project-task', $data);
    }
}
