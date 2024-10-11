<?php

namespace App\Livewire\Backend\Setups\Supports;

use App\Models\Service as ModelsService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Service extends Component
{
    use WithPagination;

    public $id;
    public $name;
    public $search;
    public $size = 10;

    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    public function store()
    {
        $this->validate();

        ModelsService::create([
            'name' => $this->name,
            'created_by' => Auth::user()->id,
        ]);

        $this->resetInput();
        session()->flash('success', 'Service created successfully.');
        return redirect()->route('support.services.index');
    }


    public function edit($id)
    {
        $service = ModelsService::findOrFail($id);

        $this->id = $service->id;
        $this->name = $service->name;
    }



    public function update()
    {
        $this->validate();

        ModelsService::find($this->id)->update([
            'name' => $this->name,
            'updated_by' => Auth::user()->id,
        ]);

        $this->resetInput();
        session()->flash('success', 'Update Successfully');
        return redirect()->route('support.services.index');
    }


    public function delete($id)
    {
        $this->id = $id;
    }


    public function destroy()
    {
        $service = ModelsService::find($this->id);
        $service->delete();
        return redirect()->route('support.services.index')->with('success', 'Service Deleted Successfully');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
        $this->reset('name');
    }


    public function render()
    {
        $services = ModelsService::where('name', 'like', "%{$this->search}%")->latest()->paginate($this->size);
        return view('livewire.backend.setups.supports.service')->with([
            'services' => $services,
        ]);
    }
}
