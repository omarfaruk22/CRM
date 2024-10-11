<?php

namespace App\Livewire\Backend;

// use App\Livewire\Backend\Setups\Supports\TicketStatus;

use App\Models\Department;
use App\Models\Service;
use App\Models\Tag;
use App\Models\Ticket;
use App\Models\TicketPriority;
use App\Models\TicketStatus;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;


class Support extends Component
{

    use WithPagination;

    public $name;
    public $imap_username;
    public $search;
    public $size = 10;

    public function render()
    {
        $tickets = Ticket::where('name', 'like', "%{$this->search}%")
            ->orWhere('email', 'like', "%{$this->search}%")
            ->orWhere('subject', 'like', "%{$this->search}%")
            ->latest()->paginate($this->size);

        $ticketStatuses = TicketStatus::all();
        $departments = Department::all();
        $ticketPriorities = TicketPriority::all();
        $tags = Tag::all();
        $services = Service::all();

        return view('livewire.backend.support')->with([
            'tickets' => $tickets,
            'ticketStatuses' => $ticketStatuses,
            'departments' => $departments,
            'ticketPriorities' => $ticketPriorities,
            'tags' => $tags,
            'services' => $services,
        ]);
    }
}
