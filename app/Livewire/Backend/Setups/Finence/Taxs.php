<?php

namespace App\Livewire\Backend\Setups\Finence;

use App\Models\Tax;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Taxs extends Component
{

    use WithPagination;

    #[Rule([
        'name' => 'required',
        'rate' => ['required', 'numeric', 'between:0,100'],
    ])]

    public $id, $name, $rate, $search, $size = 10;

    public function render()
    {
        $data['taxs'] = Tax::where('name', 'like', "%{$this->search}%")->paginate($this->size);

        return view('livewire.backend.setups.finence.taxs', $data);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'rate' => 'required|numeric|between:0,100',
        ]);

        Tax::create([
            'name' => $this->name,
            'rate' => $this->rate,
        ]);

        $this->dispatch('close-modal');

        $this->resetInput();

        session()->flash('success', 'Tax Added Successfully!');
    }

    public function edit($id)
    {
        $tax = Tax::find($id);

        $this->name = $tax->name;
        $this->rate = $tax->rate;
    }

    public function delete($id)
    {
        $this->id = $id;
    }

    public function destroy()
    {
        $tax = Tax::find($this->id);

        $tax->delete();

        return back()->with('success', 'Tax Delete Successfully');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->reset('id', 'name', 'rate');
    }
}
