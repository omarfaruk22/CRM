<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;

class TicketController extends Controller
{
    public function index($id)
    {
        $customer = Customer::find($id);
        $tickets = Ticket::all();
        $ticket = Ticket::find($id);
        return view('backend.customer.tickets.index')->with(['customer' => $customer, 'tickets' => $tickets]);
    }

    public function create()
    {
        return view('backend.customer.tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Ticket::create([
            'subject' => $request->ticket_subject,
            'name' => $request->ticket_name,
            'slug' => Str::slug($request->ticket_name),
            'tags' => $request->ticket_tag,
            'contact' => $request->ticket_contact,
            'assignticket' => $request->ticket_assignticket,
            'email' => $request->ticket_email,
            'department' => $request->ticket_department,
            'cc' => $request->ticket_cc,
            'priority' => $request->ticket_priority,
            'service' => $request->ticket_service,
            'predefined' => $request->ticket_predefined,
            'knowledge' => $request->ticket_knowledge,
            'description' => $request->ticket_description,

        ]);
        return back()->with('success', 'Ticket Information Submitted');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function render()
    {
    }
}
