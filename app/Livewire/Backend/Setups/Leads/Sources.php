<?php

namespace App\Livewire\Backend\Setups\Leads;

use App\Models\LeadsSource;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;


class Sources extends Component
{

    use WithPagination;

    public $name, $id, $search;


    protected $rules = [
        'name' => 'required|string|max:255',
    ];


    public function store()
    {
        $this->validate();

        LeadsSource::create([
            'name' => $this->name,
            'created_by' => Auth::user()->id,
        ]);

        $this->resetInput();
        $this->closeModal();

        session()->flash('success', 'Create Successfully');
        return redirect()->route('setup.leads.sources.index');
    }



    public function edit($id)
    {
        $sourceName = LeadsSource::find($id);

        $this->id = $id;
        $this->name = $sourceName->name;
    }



    public function update()
    {
        $this->validate();

        LeadsSource::find($this->id)->update([
            'name' => $this->name,
            'updated_by' => Auth::user()->id,
        ]);


        $this->resetInput();
        $this->closeModal();

        session()->flash('success', 'Update Successfully');
        return redirect()->route('setup.leads.sources.index');
    }


    public function delete($id)
    {
        $this->id = $id;
    }


    public function destroy()
    {
        $department = LeadsSource::find($this->id);
        $department->delete();
        return redirect()->route('setup.leads.sources.index')->with('success', 'Deleted Successfully');
    }


    public function render()
    {
        $data['sourceses'] = LeadsSource::where('name', 'like', "%{$this->search}%")->latest()->paginate(10);
        return view('livewire.backend.setups.leads.sources', $data);
    }


    public function closeModal()
    {
        $this->resetInput();
    }


    public function resetInput()
    {
        $this->reset('id', 'name');
    }
}
