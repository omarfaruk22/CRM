<?php

namespace App\Livewire\Backend\Project;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ProjectDiscussion as ProjectDiscussions;
use Illuminate\Support\Facades\Auth;

class ProjectDiscussion extends Component
{
    use WithPagination;
    public $mainproject_id;
    public $subject;
    public $description;
    public $show_to_customer = 1;
    public $size = 10;
    public $search;

    public function render()
    {
        $data['discussions'] = ProjectDiscussions::where('subject', 'like', "%{$this->search}%")->latest()->paginate($this->size);
        return view('livewire.backend.project.project-discussion', $data);
    }
    protected $rules = [
        'subject' => 'required|string|max:255',
    ];
    public function store()
    {
        $this->validate();

        ProjectDiscussion::create([
            'subject' => $this->subject,
            'project_id' => $this->mainproject_id,
            'description' => $this->description,
            'show_to_customer' => $this->show_to_customer ?? 0,
            'created_by' => Auth::user()->id,
        ]);

        $this->resetInput();
        session()->flash('success', 'Discussion created successfully.');

        return redirect()->route('projects.project_discussions', ['id' => $this->mainproject_id]);
    }
}
