<?php

namespace App\Livewire\Backend\Support;

use App\Models\Contact;
use App\Models\Department;
use App\Models\Staff;
use App\Models\Tag;
use App\Models\Ticket;
use App\Models\TicketPriority;
use App\Models\TicketStatus;
use Livewire\Component;
use Livewire\WithPagination;

class OtherTickets extends Component
{
    use WithPagination;

    public $ticketId;
    public $ticket;
    public $name;
    public $search;
    public $size = 3;


    public function mount($ticketId)
    {
        $this->ticketId = $ticketId;
        $this->ticket = Ticket::find($this->ticketId);
    }

    public function render()
    {
        $allTags = Tag::all();
        $allDepartments = Department::all();
        $allContacts =  Contact::all();
        $allStatuses = TicketStatus::all();
        $allPriorities = TicketPriority::all();

        $otherTickets = Ticket::where('departmentid', $this->ticket->departmentid)
            ->where('id', '!=', $this->ticketId)
            ->where('name', 'like', "%{$this->search}%")
            ->latest()
            ->paginate($this->size);

        return view('livewire.backend.support.other-tickets')->with([
            'otherTickets' => $otherTickets,
            'allTags' => $allTags,
            'allDepartments' => $allDepartments,
            'allContacts' => $allContacts,
            'allStatuses' => $allStatuses,
            'allPriorities' => $allPriorities,
            'ticketId' => $this->ticketId,
        ]);
    }
}
