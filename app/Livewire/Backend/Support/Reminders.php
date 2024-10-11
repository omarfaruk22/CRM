<?php

namespace App\Livewire\Backend\Support;

use App\Models\Reminder;
use App\Models\Staff;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Reminders extends Component
{
    use WithPagination;

    public $id;
    public $description;
    public $date;
    public $staff;
    public $notify_by_email = false;
    public $search;
    public $size = 10;
    public $ticketId;
    public $ticket;
    public $rel_id;
    public $rel_type;
    public $created_by;
    public $deleteId;

    public function mount($ticketId)
    {
        $this->ticketId = $ticketId;
        $this->ticket = Ticket::find($this->ticketId);
    }

    public function render()
    {
        $allStaff = Staff::all();

        $reminders = Reminder::where('description', 'like', "%{$this->search}%")
            ->orWhere('date', 'like', "%{$this->search}%")
            ->latest()->paginate($this->size);

        return view('livewire.backend.support.reminders')->with([
            'reminders' => $reminders,
            'staffs' => $allStaff,
            'ticket' => $this->ticket,
        ]);
    }


    protected $rules = [
        'date' => 'required|date',
        'staff' => 'required|integer',
        'description' => 'required|string|max:255',
    ];

    public function createReminder()
    {
        $this->validate();

        Reminder::create([
            'rel_id' => $this->ticketId,
            'rel_type' => 'ticket',
            'date' => $this->date,
            'staff' => $this->staff,
            'description' => $this->description,
            'notify_by_email' => $this->notify_by_email,
            'created_by' => Auth::user()->id,
        ]);

        $this->resetInput();

        session()->flash('success', 'Set reminder successfully!');

        return redirect()->route('support.show', $this->ticketId);
    }

    public function edit($id)
    {
        $reminder = Reminder::findOrFail($id);

        $this->id = $reminder->id;
        $this->date = $reminder->date;
        $this->staff = $reminder->staff;
        $this->description = $reminder->description;
        $this->notify_by_email = $reminder->notify_by_email;
    }


    public function updateReminder()
    {
        $this->validate();

        $reminder = Reminder::findOrFail($this->id);

        $reminder->update([
            'date' => $this->date,
            'staff' => $this->staff,
            'description' => $this->description,
            'notify_by_email' => $this->notify_by_email,
            'updated_by' => Auth::user()->id,
        ]);

        session()->flash('success', 'Reminder updated successfully!');
        $this->resetInput();
        return redirect()->route('support.show', $this->ticketId);
    }



    public function delete($id)
    {
        $this->deleteId = $id;
    }


    public function confirmDelete()
    {
        $reminder = Reminder::findOrFail($this->deleteId);
        $reminder->delete();

        session()->flash('success', 'Reminder deleted successfully!');
        $this->deleteId = null;
        return redirect()->route('support.show', $this->ticketId);
    }


    private function resetInput()
    {
        $this->reset('rel_id', 'rel_type', 'date', 'staff', 'description', 'notify_by_email', 'created_by');
    }
}
