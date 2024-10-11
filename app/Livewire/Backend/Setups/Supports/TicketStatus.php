<?php

namespace App\Livewire\Backend\Setups\Supports;

use App\Models\TicketStatus as ModelsTicketStatus;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class TicketStatus extends Component
{

    use WithPagination;

    public $id;
    public $name;
    public $statuscolor;
    public $statusorder;
    public $search;
    public $size = 10;

    protected $rules = [
        'name' => 'required|unique:ticket_statuses|string|max:255',
        'statuscolor' => ['nullable', 'string', 'max:255'],
        'statusorder' => ['nullable'],
    ];

    public function messages()
    {
        return [
            'name.unique' => 'The name has already been taken.',
        ];
    }

    public function store()
    {
        $this->validate();

        ModelsTicketStatus::create([
            'name' => $this->name,
            'statuscolor' => $this->statuscolor,
            'statusorder' => $this->statusorder,
            'created_by' => Auth::user()->id,
        ]);

        $this->resetInput();
        session()->flash('success', 'Created successfully.');
        return redirect()->route('support.ticket_status.index');
    }


    public function edit($id)
    {
        $ticketStatus = ModelsTicketStatus::findOrFail($id);

        $this->id = $ticketStatus->id;
        $this->name = $ticketStatus->name;
        $this->statuscolor = $ticketStatus->statuscolor;
        $this->statusorder = $ticketStatus->statusorder;
    }



    public function update()
    {
        $this->validate();

        ModelsTicketStatus::find($this->id)->update([
            'name' => $this->name,
            'statuscolor' => $this->statuscolor,
            'statusorder' => $this->statusorder,
            'updated_by' => Auth::user()->id,
        ]);

        $this->resetInput();
        session()->flash('success', 'Update Successfully');
        return redirect()->route('support.ticket_status.index');
    }



    public function delete($id)
    {
        $this->id = $id;
    }


    public function destroy()
    {
        $ticketStatus = ModelsTicketStatus::find($this->id);
        $ticketStatus->delete();
        return redirect()->route('support.ticket_status.index')->with('success', 'Deleted Successfully');
    }


    public function render()
    {
        $ticketStatuses = ModelsTicketStatus::where('name', 'like', "%{$this->search}%")->latest()->paginate($this->size);
        return view('livewire.backend.setups.supports.ticket-status')->with([
            'ticketStatuses' => $ticketStatuses,
        ]);
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
        $this->reset('name', 'statuscolor', 'statusorder');
    }
}
