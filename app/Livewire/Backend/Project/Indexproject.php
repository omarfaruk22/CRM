<?php

namespace App\Livewire\Backend\Project;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class Indexproject extends Component
{
    use WithPagination;
    public $search, $id, $size = 10;

    public function render()
    {
        $data['projects'] = Project::where('name', 'like', "%{$this->search}%")->with('tagables', 'customer')->latest()->paginate($this->size);
        return view('livewire.backend.project.indexproject', $data);
    }
}
