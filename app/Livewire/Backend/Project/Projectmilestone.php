<?php

namespace App\Livewire\Backend\Project;

use App\Models\Project;
use Livewire\Component;
use App\Models\Milestone;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Projectmilestone extends Component
{
    use WithPagination;

    public $id;
    public $mainproject_id;
    public $name;
    public $start_date;
    public $due_date;
    public $description;
    public $description_visible_to_customer = 1;
    public $milestone_order;
    public $encryption;
    public $search;
    public $size = 10;

    public function render()
    {
        $data['milestones'] = Milestone::where('name', 'like', "%{$this->search}%")->latest()->paginate($this->size);
        return view('livewire.backend.project.projectmilestone', $data);
    }

    public function mount()
    {
        $this->start_date = date('Y-m-d');
    }

    protected $rules = [
        'name' => 'required|string|max:255',
        'start_date' => 'required',
        'due_date' => 'required',
        // 'imap_username' => 'required|string|max:255',
        // 'host' => 'required|string|max:255',
        // 'password' => 'required|string',
        // 'encryption' => 'required|string|in:TLS,SSL,No Encryption',
    ];

    public function store()
    {
        $this->validate();

        Milestone::create([
            'name' => $this->name,
            'start_date' => $this->start_date,
            'due_date' => $this->due_date,
            'project_id' => $this->mainproject_id,
            'description' => $this->description,
            'description_visible_to_customer' => $this->description_visible_to_customer ?? 0,
            'milestone_order' => $this->milestone_order,
            'created_by' => Auth::user()->id,
        ]);

        $this->resetInput();
        session()->flash('success', 'Milestone created successfully.');

        return redirect()->route('projects.project_milestones', ['id' => $this->mainproject_id]);
    }
    public function edit($id)
    {
        $milestones = Milestone::findOrFail($id);
        $this->id = $milestones->id;
        $this->name = $milestones->name;
        $this->start_date = $milestones->start_date;
        $this->due_date = $milestones->due_date;
        $this->description = $milestones->description;
        $this->description_visible_to_customer = $milestones->description_visible_to_customer;
        $this->milestone_order = $milestones->milestone_order;
    }
    public function update()
    {
        Milestone::find($this->id)->update([
            'name' => $this->name,
            'start_date' => $this->start_date,
            'due_date' => $this->due_date,
            'description' => $this->description,
            'description_visible_to_customer' => $this->description_visible_to_customer ?? 0,
            'milestone_order' => $this->milestone_order,
            'updated_by' => Auth::user()->id,
        ]);
        $this->resetInput();
        session()->flash('success', 'Milestone update successfully.');

        return redirect()->route('projects.project_milestones', ['id' => $this->mainproject_id]);
    }
    public function delete($id)
    {
        $this->id = $id;
    }


    public function destroy()
    {
        $milestone = Milestone::find($this->id);

        $milestone->delete();

        return redirect()->route('projects.project_milestones', ['id' => $this->mainproject_id])->with('success', ' Milestone Deleted Successfully');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->reset('name', 'due_date', 'description');
    }
}
