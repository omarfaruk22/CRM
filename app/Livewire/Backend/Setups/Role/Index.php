<?php

namespace App\Livewire\Backend\Setups\Role;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    use WithPagination;

    public $id, $search, $size = 10;

    public function render()
    {
        $data['roles'] = Role::where('name', 'like', "%{$this->search}%")->paginate($this->size);

        return view('livewire.backend.setups.role.index', $data);
    }

    public function delete($id)
    {
        $this->id = $id;
    }

    public function destroy()
    {
        $tax = Role::find($this->id);

        $tax->delete();

        return back()->with('success', 'Role Delete Successfully');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->reset('id');
    }
}
