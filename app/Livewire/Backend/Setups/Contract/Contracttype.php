<?php

namespace App\Livewire\Backend\Setups\Contract;

use App\Models\ContractType as ModelsContractType;
use Livewire\Component;
use Livewire\WithPagination;

class Contracttype extends Component
{
    use WithPagination;
    public $search, $size = 10, $id, $name;
    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    public function store()
    {
        $this->validate();
        ModelsContractType::create([
            'name' => $this->name,
        ]);

        $this->dispatch('close-modal');

        $this->resetInput();

        session()->flash('success', 'Create Successfully');
    }

    public function edit($id)
    {
        $status = ModelsContractType::find($id);

        $this->name = $status->name;
        $this->id = $id;
    }

    public function update()
    {
        ModelsContractType::find($this->id)->update([
            'name' => $this->name,
        ]);

        $this->dispatch('close-modal');

        $this->resetInput();

        session()->flash('success', 'Update Successfully');
    }

    public function delete($id)
    {
        $this->id = $id;
    }

    public function destroy()
    {
        $status = ModelsContractType::find($this->id);

        $status->delete();

        return back()->with('success', ' Status Delete Successfully');
    }

    public function render()
    {
        $data['names'] = ModelsContractType::where('name', 'like', "%{$this->search}%")->paginate($this->size);
        return view('livewire.backend.setups.contract.contracttype', $data);
    }
    public function closeModal()
    {
        $this->resetInput();
    }
    public function resetInput()
    {
        $this->reset('id', 'name',);
    }
}
