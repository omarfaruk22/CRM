<?php

namespace App\Livewire\Backend\Setups\Supports;

use App\Models\TicketPriority;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class TicketPriorities extends Component
{

    use WithPagination;

    public $id;
    public $name;
    public $search;
    public $size = 10;

    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    public function render()
    {
        $ticketPriorities = TicketPriority::where('name', 'like', "%{$this->search}%")->latest()->paginate($this->size);
        return view('livewire.backend.setups.supports.ticket-priorities')->with([
            'ticketPriorities' => $ticketPriorities,
        ]);
    }

    public function store()
    {
        $this->validate();
        $createdBy = Auth::user()->name;

        TicketPriority::create([
            'name' => $this->name,
            'created_by' => $createdBy,
        ]);

        $this->resetInput();
        session()->flash('success', 'Ticket priority created successfully.');
        return redirect()->route('support.ticket_priority.index');
    }


    public function edit($id)
    {
        $ticketPriority = TicketPriority::findOrFail($id);
        $this->id = $ticketPriority->id;
        $this->name = $ticketPriority->name;
    }



    public function update()
    {
        $this->validate();
        $updatedBy = Auth::user()->name;

        TicketPriority::find($this->id)->update([
            'name' => $this->name,
            'updated_by' => $updatedBy,
        ]);

        $this->resetInput();
        session()->flash('success', 'Update Successfully');
        return redirect()->route('support.ticket_priority.index');
    }


    public function delete($id)
    {
        $this->id = $id;
    }


    public function destroy()
    {
        $ticketPriority = TicketPriority::find($this->id);

        $ticketPriority->delete();

        return redirect()->route('support.ticket_priority.index')->with('success', 'Deleted Successfully');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
        $this->reset('name');
    }
}
