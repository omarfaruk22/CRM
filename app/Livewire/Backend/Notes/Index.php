<?php

namespace App\Livewire\Backend\Notes;

use App\Models\Note;
use Livewire\Component;
use PhpParser\Builder\Function_;
use App\Exports\CustomerNoteExport;

class Index extends Component
{
    public $edit_status = 0, $description, $id, $search;

    public function edit($id)
    {
        $this->edit_status = 1;

        $note = Note::find($id);

        $this->description = $note->description;
        $this->id = $id;
    }

    public function edit_close()
    {
        $this->edit_status = 0;

        $this->reset('description', 'id');
    }
    public function update()
    {
        $note = Note::find($this->id)->update([
            'description' => $this->description,
        ]);

        $this->edit_close();

        session()->flash('success', 'Update Successfully');
    }

    public function render()
    {
        $data['notes'] = Note::where(
            'description',
            'like',
            "%{$this->search}%"
        )->get();

        return view('livewire.backend.notes.index', $data);
    }
}
