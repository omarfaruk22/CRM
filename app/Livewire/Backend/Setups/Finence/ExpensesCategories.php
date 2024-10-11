<?php

namespace App\Livewire\Backend\Setups\Finence;

use App\Models\ExpensesCategory;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class ExpensesCategories extends Component
{
    use WithPagination;

    #[Rule([
        'name' => 'required',
    ])]

    public $id, $name, $description, $search, $size = 10;

    public function render()
    {
        $data['categories'] = ExpensesCategory::where('name', 'like', "%{$this->search}%")->paginate($this->size);

        return view('livewire.backend.setups.finence.expenses-categories', $data);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|unique:expenses_categories,name',
        ]);

        ExpensesCategory::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->dispatch('close-modal');

        $this->resetInput();

        session()->flash('success', 'Expenses Category Added Successfully!');
    }

    public function edit($id)
    {
        $currency = ExpensesCategory::find($id);

        $this->id = $currency->id;
        $this->name = $currency->name;
        $this->description = $currency->description;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|unique:expenses_categories,name,' . $this->id,
        ]);

        ExpensesCategory::find($this->id)->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->dispatch('close-modal');

        $this->resetInput();

        session()->flash('success', 'Expenses Category Update Successfully!');
    }

    public function delete($id)
    {
        $this->id = $id;
    }

    public function destroy()
    {
        $tax = ExpensesCategory::find($this->id);

        $tax->delete();

        return back()->with('success', 'Expenses Category Delete Successfully');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->reset('id', 'name', 'description');
    }
}
