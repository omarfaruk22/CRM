<?php

namespace App\Livewire\Backend\Setups\Leads;

use App\Models\LeadsStatus;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Statuses extends Component
{

    use WithPagination;

    public $name, $id, $size = 10, $search, $statusorder, $color;


    protected $rules = [
        'name' => 'required|string|max:255',
        'color' => 'required|string',
        'statusorder' => 'required|numeric',
    ];



    public function store()
    {

        $this->validate();

        LeadsStatus::create([
            'name' => $this->name,
            'statusorder' => $this->statusorder,
            'color' => $this->color,
            'created_by' => Auth::user()->id,
        ]);

        $this->dispatch('close-modal');
        $this->resetInput();

        session()->flash('success', 'Create Successfully');
        return redirect()->route('setup.leads.statuses.index');
    }



    public function edit($id)
    {
        $status = LeadsStatus::find($id);

        $this->id = $id;
        $this->name = $status->name;
        $this->color = $status->color;
        $this->statusorder = $status->statusorder;
    }


    public function update()
    {
        $this->validate();

        LeadsStatus::find($this->id)->update([
            'name' => $this->name,
            'color' => $this->color,
            'statusorder' => $this->statusorder,
            'updated_by' => Auth::user()->id,
        ]);

        $this->dispatch('close-modal');
        $this->resetInput();
        session()->flash('success', 'Update Successfully');
        return redirect()->route('setup.leads.statuses.index');
    }


    public function delete($id)
    {
        $this->id = $id;
    }


    public function destroy()
    {
        $status = LeadsStatus::find($this->id);
        $status->delete();
        return redirect()->route('setup.leads.statuses.index')->with('success', 'Delete Successfully');
    }


    public function render()
    {
        $data['statuses'] = LeadsStatus::where('name', 'like', "%{$this->search}%")->paginate($this->size);
        return view('livewire.backend.setups.leads.statuses', $data);
    }


    public function closeModal()
    {
        $this->resetInput();
    }


    public function resetInput()
    {
        $this->reset('id', 'name', 'statusorder', 'color');
    }
}
