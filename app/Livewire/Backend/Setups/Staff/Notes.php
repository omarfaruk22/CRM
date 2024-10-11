<?php

namespace App\Livewire\Backend\Setups\Staff;

use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Notes extends Component
{

    use WithPagination;

    public $id;
    public $staffs;
    public $description;
    public $rel_id;
    public $rel_type;
    public $created_by;
    public $updated_by;
    public $search;
    public $size = 10;


    public function mount($staffs)
    {
        $this->staffs = $staffs;
    }


    protected $rules = [
        'description' => 'required',
    ];


    public function store()
    {
        $this->validate();

        $relType = 'staff';

        Note::create([
            'rel_id' => $this->staffs->id,
            'rel_type' => $relType,
            'description' => $this->description,
            'created_by' => Auth::user()->id,
        ]);

        $this->resetInput();

        session()->flash('success', 'Note created successfully');
        return redirect()->route('setup.staff.show', $this->staffs->id);
    }


    public function edit($id)
    {
        $notes = Note::findOrFail($id);
        $this->id = $notes->id;
        $this->description = $notes->description;
    }


    public function update()
    {
        Note::find($this->id)->update([
            'description' => $this->description,
            'updated_by' => Auth::user()->id,
        ]);

        $this->resetInput();
        session()->flash('success', 'Note update Successfully');
        return redirect()->route('setup.staff.show', $this->staffs->id);
    }


    public function delete($id)
    {
        $this->id = $id;
    }


    public function destroy()
    {
        $note = Note::find($this->id);
        if ($note) {
            $note->delete();
            return redirect()->route('setup.staff.show', $this->staffs->id)->with('success', 'Note Deleted Successfully');
        } else {
            return redirect()->route('setup.staff.show', $this->staffs->id)->with('error', 'Note not found');
        }
    }


    public function closeModal()
    {
        $this->resetInput();
    }


    private function resetInput()
    {
        $this->reset('rel_id', 'rel_type', 'description', 'created_by', 'updated_by');
    }


    public function render()
    {
        $notes = Note::where('rel_id', $this->staffs->id)->where('rel_type', 'staff')->where('description', 'like', "%{$this->search}%")->latest()->paginate($this->size);
        return view('livewire.backend.setups.staff.notes')->with([
            'notes' => $notes,
        ]);
    }
}
