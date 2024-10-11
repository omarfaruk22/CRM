<?php

namespace App\Livewire\Backend\Setups\Estimaterequest;

use App\Models\EstimateRequestStatus as ModelsEstimateRequestStatus;
use Livewire\Component;
use Livewire\WithPagination;

class Estimaterequeststatus extends Component
{
    use WithPagination;

    public $name, $id, $size = 10, $search, $statusorder, $color, $flag;
    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    public function store()
    {
        $this->validate();
        ModelsEstimateRequestStatus::create([
            'name' => $this->name,
            'statusorder' => $this->statusorder,
            'color' => $this->color,
            'flag' => $this->name,
        ]);

        $this->dispatch('close-modal');

        $this->resetInput();

        session()->flash('success', 'Create Successfully');
    }

    public function edit($id)
    {
        $status = ModelsEstimateRequestStatus::find($id);

        $this->name = $status->name;
        $this->color = $status->color;
        $this->statusorder = $status->statusorder;
        $this->id = $id;
    }

    public function update()
    {
        ModelsEstimateRequestStatus::find($this->id)->update([
            'name' => $this->name,
            'color' => $this->color,
            'statusorder' => $this->statusorder,

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
        $status = ModelsEstimateRequestStatus::find($this->id);

        $status->delete();

        return back()->with('success', ' Status Delete Successfully');
    }

    public function render()
    {
        $data['estimatestatuses'] = ModelsEstimateRequestStatus::where('name', 'like', "%{$this->search}%")->paginate($this->size);
        return view('livewire.backend.setups.estimaterequest.estimaterequeststatus', $data);
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
