<?php

namespace App\Livewire\Backend\Setups\Customfields;

use Livewire\Component;
use  App\Models\Customfield;
use Livewire\WithPagination;

class Customfields extends Component
{
    use WithPagination;
    public $search, $id, $size = 10;
    public function render()
    {
        $data['customfield'] = Customfield::where('name', 'like', "%{$this->search}%")->latest()->paginate($this->size);

        return view('livewire.backend.setups.customfields.customfields', $data);
    }
    public function delete($id)
    {
        $this->id = $id;
    }
    public function destroy()
    {
        $customfields = Customfield::find($this->id);
        $customfields->delete();
        return redirect()->route('setup.custom-fields.index')->with('success', ' customField Deleted Successfully');
    }
}
