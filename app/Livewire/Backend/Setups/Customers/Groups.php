<?php

namespace App\Livewire\Backend\Setups\Customers;

use App\Models\Customers_group;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;


class Groups extends Component
{
    use WithPagination;

    public $name, $id, $search, $size = 10;

    protected $rules = [
        'name' => 'required|string|max:255',
    ];


    public function store()
    {
        $this->validate();

        Customers_group::create([
            'gname' => $this->name,
            'created_by' => Auth::user()->id,
        ]);

        $this->dispatch('close-modal');
        $this->resetInput();

        session()->flash('success', 'Created successfully.');
        return redirect()->route('setup.customer.index');
    }


    public function edit($id)
    {
        $customarsGroups = Customers_group::find($id);

        $this->name = $customarsGroups->gname;
        $this->id = $id;
    }


    public function update()
    {
        Customers_group::find($this->id)->update([
            'gname' => $this->name,
            'updated_by' => Auth::user()->id,
        ]);

        $this->dispatch('close-modal');
        $this->resetInput();

        session()->flash('success', 'Updated successfully.');
        return redirect()->route('setup.customer.index');
    }


    public function resetInput()
    {
        $this->reset('id', 'name');
    }


    public function closeModal()
    {
        $this->resetInput();
    }


    public function render()
    {
        $customarsGroups = Customers_group::where('gname', 'like', "%{$this->search}%")->latest()->paginate($this->size);
        return view('livewire.backend.setups.customers.groups')->with([
            'customarsGroups' => $customarsGroups,
        ]);
    }
}
